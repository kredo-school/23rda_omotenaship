# # AMI IDの取得（Amazon Linux 2）
# data "aws_ami" "amazon_linux_2" {
#   most_recent = true
#   owners      = ["amazon"]

#   filter {
#     name   = "name"
#     values = ["amzn2-ami-hvm-*-x86_64-gp2"]
#   }
# }

# # EC2インスタンスの作成
# resource "aws_instance" "web" {
#   ami                         = "ami-0abcdef1234567890" # 適切なAMI IDに置き換えてください
#   instance_type               = "t3.micro"
#   subnet_id                   = aws_subnet.public_subnet.id
#   vpc_security_group_ids      = [aws_security_group.ec2_sg.id]
#   key_name                    = aws_key_pair.deployer.key_name
#   associate_public_ip_address = true

#   # プロビジョナーでLaravelをデプロイ
#   provisioner "file" {
#     source      = "../../"                     # Laravel プロジェクトのルートディレクトリへのパス
#     destination = "/home/ec2-user/laravel-app" # EC2 インスタンスのディレクトリ(/var/www/htmlに変更？)
#   }

#   provisioner "remote-exec" {
#     inline = [
#       # 必要なパッケージのインストール
#       "sudo yum update -y",
#       "sudo amazon-linux-extras install -y php8.0",
#       "sudo yum install -y git",
#       "sudo yum install -y composer unzip",
#       # アプリケーションディレクトリの設定
#       "sudo mv /home/ec2-user/laravel-app /var/www/html",
#       "sudo chown -R ec2-user:ec2-user /var/www/html",
#       # Laravelのセットアップ
#       "cd /var/www/html",
#       "composer install --no-dev --optimize-autoloader",
#       "cp .env.example .env",
#       # .envファイルの設定
#       "php artisan key:generate",
#       "sed -i 's/DB_HOST=127.0.0.1/DB_HOST=${aws_db_instance.mysql.address}/' .env",
#       "sed -i 's/DB_DATABASE=laravel/DB_DATABASE=laravel_db/' .env",
#       "sed -i 's/DB_USERNAME=root/DB_USERNAME=${var.db_username}/' .env",
#       "sed -i 's/DB_PASSWORD=/DB_PASSWORD=${var.db_password}/' .env",
#       # マイグレーションの実行
#       "php artisan migrate --force",
#       # Apacheの設定と起動
#       "sudo systemctl enable httpd",
#       "sudo systemctl start httpd",
#     ]

#     connection {
#       type        = "ssh"
#       user        = "ec2-user"
#       private_key = file("~/.ssh/deployer.pem")
#       host        = self.public_ip
#     }
#   }

#   tags = {
#     Name = "LaravelWebServer"
#   }
# }

