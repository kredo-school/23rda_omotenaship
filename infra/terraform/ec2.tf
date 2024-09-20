# # AMI IDの取得（Amazon Linux 2）
data "aws_ami" "amazon_linux_2" {
  most_recent = true
  owners      = ["amazon"]

  filter {
    name   = "name"
    values = ["amzn2-ami-hvm-*-x86_64-gp2"] # Amazon Linux 2のAMI
  }
}

# null_resourceでローカルでzipを作成
resource "null_resource" "zip_laravel" {
  provisioner "local-exec" {
    command = "${path.module}/../scripts/zip_laravel.sh ${path.module}"
  }

  # 常に再実行されるようにトリガーを設定
  triggers = {
    always_run = "${timestamp()}"
  }
}

# EC2インスタンスの作成
resource "aws_instance" "web" {
  ami = data.aws_ami.amazon_linux_2.id # Amazon Linux 2のAMI ID
  #   instance_type               = "t3.micro"
  instance_type               = "t3.small"
  subnet_id                   = aws_subnet.subnet_a.id # VPCのサブネットID
  vpc_security_group_ids      = [aws_security_group.ec2_sg.id]
  key_name                    = aws_key_pair.deployer.key_name # キーペアの名前
  associate_public_ip_address = true

  depends_on = [
    null_resource.zip_laravel, # null_resourceが完了した後に実行
    aws_db_instance.mysql      # データベースインスタンスの作成完了を待つ
  ]

  # 既存のディレクトリを削除
  provisioner "remote-exec" {
    script = "${path.module}/../scripts/remove_existing_dir.sh"

    connection {
      type        = "ssh"
      user        = "ec2-user"
      private_key = file("~/.ssh/id_rsa_aws")
      host        = self.public_ip
      timeout     = "5m"
      agent       = false
    }
  }

  # ファイルのアップロード
  provisioner "file" {
    source      = "${path.module}/laravel-app.zip" # ローカルのZIPファイル
    destination = "/home/ec2-user/laravel-app.zip" # EC2 インスタンスの保存先

    connection {
      type        = "ssh"
      user        = "ec2-user"
      private_key = file("~/.ssh/id_rsa_aws")
      host        = self.public_ip
      timeout     = "5m"
      agent       = false
    }
  }

  # ファイルの解凍
  provisioner "remote-exec" {
    script = "${path.module}/../scripts/unzip_zip.sh"

    connection {
      type        = "ssh"
      user        = "ec2-user"
      private_key = file("~/.ssh/id_rsa_aws")
      host        = self.public_ip
      timeout     = "5m"
      agent       = false
    }
  }

  # ファイルの移動
  provisioner "remote-exec" {
    script = "${path.module}/../scripts/move_files.sh"

    connection {
      type        = "ssh"
      user        = "ec2-user"
      private_key = file("~/.ssh/id_rsa_aws")
      host        = self.public_ip
      timeout     = "5m"
      agent       = false
    }
  }

  # PHP 8.2とnvm、Node.js 18のインストール、Composerのインストール
  provisioner "remote-exec" {
    script = "${path.module}/../scripts/install_dependencies.sh"

    connection {
      type        = "ssh"
      user        = "ec2-user"
      private_key = file("~/.ssh/id_rsa_aws")
      host        = self.public_ip
      timeout     = "20m"
      agent       = false
    }
  }

  # Apacheのインストールと設定
  provisioner "remote-exec" {
    script = "${path.module}/../scripts/configure_apache.sh"

    connection {
      type        = "ssh"
      user        = "ec2-user"
      private_key = file("~/.ssh/id_rsa_aws")
      host        = self.public_ip
      timeout     = "10m"
      agent       = false
    }
  }

  # Laravelのセットアップ
  # LaravelのセットアップスクリプトをEC2インスタンスにアップロード
  provisioner "file" {
    source = "${path.module}/../scripts/setup_laravel.sh"
    # destination = "/home/ec2-user/tmp/setup_laravel.sh"
    destination = "/tmp/setup_laravel.sh"

    connection {
      type        = "ssh"
      user        = "ec2-user"
      private_key = file("~/.ssh/id_rsa_aws")
      host        = self.public_ip
      timeout     = "5m"
      agent       = false
    }
  }

#   # Laravelのセットアップスクリプトを実行
#   provisioner "remote-exec" {
#     inline = [
#       "echo 'Changing permission of setup_laravel.sh'",
#       #   "chmod +x /home/ec2-user/tmp/setup_laravel.sh",
#       "chmod +x /tmp/setup_laravel.sh",

#       "echo 'Running setup_laravel.sh'",
#       #   "/home/ec2-user/tmp/setup_laravel.sh ${aws_db_instance.mysql.address} ${var.db_username} ${var.db_password}",
#       #   "sh /home/ec2-user/tmp/setup_laravel.sh ${aws_db_instance.mysql.address} ${var.db_username} ${var.db_password}",
#       "sh /tmp/setup_laravel.sh ${aws_db_instance.mysql.address} ${var.db_username} ${var.db_password}",
#     ]

#     connection {
#       type        = "ssh"
#       user        = "ec2-user"
#       private_key = file("~/.ssh/id_rsa_aws")
#       host        = self.public_ip
#       timeout     = "20m"
#       agent       = false
#     }
#   }

  tags = {
    Name = "LaravelWebServer"
  }
}
