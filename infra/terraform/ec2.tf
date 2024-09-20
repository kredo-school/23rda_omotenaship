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
  #   provisioner "remote-exec" {
  #     inline = [
  #       "set -ex",

  #       "echo \"Navigating to Laravel application directory...\"",
  #       "cd /var/www/html/public",

  #       # 既存のnode_modulesを完全に削除
  #       "echo \"Removing existing node_modules directory...\"",
  #       "rm -rf node_modules",

  #       # 既存のシンボリックリンクが存在する場合は削除
  #       "echo \"Removing existing .bin directory links...\"",
  #       "rm -f .bin/*",

  #       "echo \"Installing Composer dependencies...\"",
  #       "composer install --no-dev --optimize-autoloader",

  #       "echo \"Installing npm dependencies...\"",
  #       "export NVM_DIR=\"$HOME/.nvm\"",
  #       "[ -s \"$NVM_DIR/nvm.sh\" ] && . \"$NVM_DIR/nvm.sh\"",
  #       "nvm use 18",
  #       "npm ci", # クリーンインストール

  #       "echo \"Building frontend assets...\"",
  #       "npm run production",

  #       "echo \"Creating .env file...\"",
  #       "cp .env.example .env",

  #       "echo \"Generating application key...\"",
  #       "php artisan key:generate",

  #       "echo \"Setting environment variables...\"",
  #       "sed -i 's/APP_ENV=local/APP_ENV=production/' .env",
  #       "sed -i 's/APP_DEBUG=true/APP_DEBUG=false/' .env",
  #       "sed -i 's/DB_HOST=127.0.0.1/DB_HOST=${aws_db_instance.mysql.address}/' .env",
  #       "sed -i 's/DB_DATABASE=laravel/DB_DATABASE=laravel_db/' .env",
  #       "sed -i 's/DB_USERNAME=root/DB_USERNAME=${var.db_username}/' .env",
  #       "sed -i 's/DB_PASSWORD=/DB_PASSWORD=${var.db_password}/' .env",

  #       "echo \"Running database migrations...\"",
  #       "php artisan migrate --force",

  #       "echo \"Seeding database...\"",
  #       "php artisan db:seed --force",

  #       "echo \"Caching configuration...\"",
  #       "php artisan config:cache",

  #       "echo \"Caching routes...\"",
  #       "php artisan route:cache",

  #       "echo \"Caching views...\"",
  #       "php artisan view:cache",

  #       "echo \"Setting ownership and permissions for storage and cache directories...\"",
  #       "sudo chown -R apache:apache /var/www/html/storage",
  #       "sudo chown -R apache:apache /var/www/html/bootstrap/cache",
  #       "sudo chmod -R 775 /var/www/html/storage",
  #       "sudo chmod -R 775 /var/www/html/bootstrap/cache",
  #       "echo \"Ownership and permissions set successfully.\"",

  #       "echo \"Laravel setup completed successfully.\""
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
