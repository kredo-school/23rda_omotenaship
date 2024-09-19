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
    command = <<EOT
    zip -r ${path.module}/laravel-app.zip ../../ -x '../../infra/terraform/*'
    ls -l ${path.module}/laravel-app.zip
    echo 'Zip file created successfully'
    EOT
  }

  # 常に再実行されるようにトリガーを設定
  triggers = {
    always_run = "${timestamp()}"
  }
}

# EC2インスタンスの作成
resource "aws_instance" "web" {
  ami                         = data.aws_ami.amazon_linux_2.id # Amazon Linux 2のAMI ID
  instance_type               = "t3.micro"
  subnet_id                   = aws_subnet.subnet_a.id # VPCのサブネットID
  vpc_security_group_ids      = [aws_security_group.ec2_sg.id]
  key_name                    = aws_key_pair.deployer.key_name # キーペアの名前
  associate_public_ip_address = true

  depends_on = [null_resource.zip_laravel] # null_resourceが完了した後に実行

  # 既存のディレクトリを削除
  provisioner "remote-exec" {
    inline = [
      "rm -rf /home/ec2-user/laravel-app"
    ]

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
    inline = [
      "mkdir -p /home/ec2-user/laravel-app",                                # ディレクトリの作成
      "unzip /home/ec2-user/laravel-app.zip -d /home/ec2-user/laravel-app", # EC2上で解凍
      "rm /home/ec2-user/laravel-app.zip"                                   # 圧縮ファイルを削除
    ]

    connection {
      type        = "ssh"
      user        = "ec2-user"
      private_key = file("~/.ssh/id_rsa_aws")
      host        = self.public_ip
      timeout     = "5m"
      agent       = false
    }
  }

  # プロビジョナーでLaravelをデプロイ
  provisioner "remote-exec" {
    inline = [
    #   "set -e",  # エラー発生時にスクリプトを停止
      "set -ex", # エラー発生時にスクリプトを停止し、コマンドを表示

      # /var/www/html ディレクトリの存在を確認し、なければ作成
      "echo \"Checking if /var/www/html exists...\"",
      "if [ ! -d /var/www/html ]; then sudo mkdir -p /var/www/html; fi",

      # ディレクトリの所有者と権限を設定
      "echo \"Setting ownership and permissions...\"",
      "sudo chown -R ec2-user:ec2-user /var/www/html",
      "sudo chmod -R 755 /var/www/html",

      # ファイルの移動
      "echo \"Moving non-hidden files...\"",
      "sudo mv /home/ec2-user/laravel-app/* /var/www/html/", # ディレクトリ内のファイルを移動
      "echo \"Moving hidden files...\"",
      "sudo mv /home/ec2-user/laravel-app/.[!.]* /var/www/html/", # 隠しファイルも移動する
      "echo \"Removing source directory...\"",
      "sudo rmdir /home/ec2-user/laravel-app", # 空になったディレクトリを削除

      # 必要なパッケージのインストール
      "sudo yum update -y", # パッケージの更新
      #   "sudo amazon-linux-extras install -y php8.0", # PHPのインストール
      "sudo yum install -y git", # Gitのインストール
      #   "sudo yum install -y unzip",                  # unzipのインストール
      "sudo yum install -y php php-cli php-mbstring unzip",

      # Composerのインストール
      "php -r \"copy('https://getcomposer.org/installer', 'composer-setup.php');\"",
      #   "HASH=\\\"$(wget -q -O - https://composer.github.io/installer.sig)\\\"",
      "HASH=\"$(wget -q -O - https://composer.github.io/installer.sig)\"",
      #   "php -r \"if (hash_file('SHA384', 'composer-setup.php') === \\\"$HASH\\\") { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;\"",
      "php -r \"if (hash_file('SHA384', 'composer-setup.php') === \"$HASH\") { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;\"",
      "sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer",
      "php -r \"unlink('composer-setup.php');\"",

      # Node.jsとnpmのインストール
      "sudo yum install -y gcc-c++ make",                                # Node.jsのインストールに必要
      "curl -sL https://rpm.nodesource.com/setup_14.x | sudo -E bash -", # Node.jsのインストール
      "sudo yum install -y nodejs",                                      # Node.jsのインストール

      # Apacheの設定
      # Apacheのインストール
      "sudo yum install -y httpd",
      # 起動時にApacheを自動起動
      "sudo systemctl enable httpd",
      # Apacheの起動
      "echo \"Starting Apache...\"",
      "sudo systemctl start httpd",
      # DocumentRootの変更
      "echo \"Changing DocumentRoot...\"",
      "sudo sed -i 's|DocumentRoot \"/var/www/html\"|DocumentRoot \"/var/www/html/public\"|' /etc/httpd/conf/httpd.conf",
      # <Directory>ブロックの更新
      "echo \"Changing <Directory> block...\"",
      "sudo sed -i 's|<Directory \"/var/www/html\">|<Directory \"/var/www/html/public\">|' /etc/httpd/conf/httpd.conf",
      # AllowOverrideの変更
        "sudo sed -i '/<Directory \"/var/www/html/public\">/,/<\\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/httpd/conf/httpd.conf",
      # Apacheの再起動
      "echo \"Restarting Apache...\"",
      "sudo systemctl restart httpd",

      # Laravelのセットアップ
      #   "cd /var/www/html",                                # アプリケーションディレクトリに移動
      #   "composer install --no-dev --optimize-autoloader", # Composerパッケージのインストール
      #   "npm install",                                     # npmパッケージのインストール
      #   "npm run production",                              # 本番環境用にビルド
      #   "cp .env.example .env",                            # .envファイルの作成

      # .envファイルの設定
      #   "php artisan key:generate",
      #   "sed -i 's/APP_ENV=local/APP_ENV=production/' .env",
      #   "sed -i 's/APP_DEBUG=true/APP_DEBUG=false/' .env",
      #   "sed -i 's/DB_HOST=127.0.0.1/DB_HOST=${aws_db_instance.mysql.address}/' .env",
      #   "sed -i 's/DB_DATABASE=laravel/DB_DATABASE=laravel_db/' .env",
      #   "sed -i 's/DB_USERNAME=root/DB_USERNAME=${var.db_username}/' .env",
      #   "sed -i 's/DB_PASSWORD=/DB_PASSWORD=${var.db_password}/' .env",

      # 権限の設定
      #   "sudo chown -R apache:apache /var/www/html",       # Apacheのユーザーにディレクトリの所有権を変更
      #   "sudo chmod -R 775 /var/www/html/storage",         # ディレクトリのパーミッションを変更
      #   "sudo chmod -R 775 /var/www/html/laravel-app/storage",         # ディレクトリのパーミッションを変更
      #   "sudo chmod -R 775 /var/www/html/laravel-app/bootstrap/cache", # ディレクトリのパーミッションを変更

      # マイグレーションの実行
      #   "php artisan migrate --force",
      #   "php artisan db:seed --force",

      # キャッシュのクリア
      #   "php artisan config:cache",
      #   "php artisan route:cache",
      #   "php artisan view:cache",
    ]

    connection {
      type        = "ssh"
      user        = "ec2-user"
      private_key = file("~/.ssh/id_rsa_aws")
      host        = self.public_ip
      timeout     = "5m"
      agent       = false
    }
  }

  tags = {
    Name = "LaravelWebServer"
  }


}

