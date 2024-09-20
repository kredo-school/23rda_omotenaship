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
    inline = [
      "echo \"Creating laravel-app directory...\"",
      "mkdir -p /home/ec2-user/laravel-app",
      "echo \"Unzipping laravel-app.zip...\"",
      "unzip /home/ec2-user/laravel-app.zip -d /home/ec2-user/laravel-app",
      "echo \"Removing laravel-app.zip...\"",
      "rm /home/ec2-user/laravel-app.zip"
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

  # ファイルの移動
  provisioner "remote-exec" {
    inline = [
      # エラー発生時にスクリプトを停止し、コマンドを表示
      "set -ex",

      # /var/www/html ディレクトリの存在を確認し、なければ作成
      "echo \"Checking if /var/www/html exists...\"",
      "if [ ! -d /var/www/html ]; then sudo mkdir -p /var/www/html; fi",

      # ディレクトリの所有者と権限を設定
      "echo \"Setting ownership and permissions...\"",
      "sudo chown -R ec2-user:ec2-user /var/www/html",
      "sudo chmod -R 755 /var/www/html",

      # ファイルの移動
      "echo \"Moving non-hidden files...\"",
      "sudo mv /home/ec2-user/laravel-app/* /var/www/html/",

      # 隠しファイルも移動する
      "echo \"Moving hidden files...\"",
      "sudo mv /home/ec2-user/laravel-app/.[!.]* /var/www/html/",

      # 空になったディレクトリを削除
      "echo \"Removing source directory...\"",
      "sudo rmdir /home/ec2-user/laravel-app",
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

  # PHP 8.2とnvm、Node.js 18のインストール、Composerのインストール
  provisioner "remote-exec" {
    inline = [
      "set -ex",

      # EPELリポジトリの有効化
      "echo \"Enabling EPEL repository...\"",
      "sudo amazon-linux-extras install -y epel",

      # PHP 8.2のインストール
      "echo \"Installing PHP 8.2 and necessary extensions...\"",
      "sudo amazon-linux-extras install -y php8.2",
      "sudo yum install -y php-cli php-mbstring php-xml php-pdo php-mysqlnd",

      # PHPバージョンの確認
      "echo \"Verifying PHP version...\"",
      "php -v",

      # nvmのインストール
      "echo \"Installing NVM (Node Version Manager)...\"",
      "curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash",

      # nvmの環境設定とNode.js 18のインストール
      "echo \"Configuring NVM...\"",
      "export NVM_DIR=\"$HOME/.nvm\"",
      "[ -s \"$NVM_DIR/nvm.sh\" ] && . \"$NVM_DIR/nvm.sh\"",

      "echo \"Installing Node.js 18...\"",
      "nvm install 18",
      "nvm use 18",
      "nvm alias default 18",

      # npmのアップグレード（必要に応じて）
      #   "echo \"Upgrading npm to the latest version...\"",
      #   "npm install -g npm@latest",

      # Composerのインストール
      "echo \"Installing Composer...\"",
      "php -r \"copy('https://getcomposer.org/installer', 'composer-setup.php');\"",
      "HASH=\"$(wget -q -O - https://composer.github.io/installer.sig)\"",
      "php -r \"if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;\"",
      "sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer",
      "php -r \"unlink('composer-setup.php');\""
    ]

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
    inline = [
      "set -ex",

      # Apacheのインストール
      "echo \"Installing Apache...\"",
      "sudo yum install -y httpd",

      # Apacheの起動と自動起動設定
      "echo \"Enabling and starting Apache...\"",
      "sudo systemctl enable httpd",
      "sudo systemctl start httpd",

      # DocumentRootの変更
      "echo \"Updating DocumentRoot to /var/www/html/public...\"",
      "sudo sed -i 's|DocumentRoot \"/var/www/html\"|DocumentRoot \"/var/www/html/public\"|' /etc/httpd/conf/httpd.conf",

      # <Directory> ブロックのパス変更
      "echo \"Updating <Directory> block to /var/www/html/public...\"",
      "sudo sed -i 's|<Directory \"/var/www/html\">|<Directory \"/var/www/html/public\">|' /etc/httpd/conf/httpd.conf",

      # AllowOverrideの変更
      "echo \"Setting AllowOverride to All...\"",
      "sudo sed -i '/<Directory \"\\/var\\/www\\/html\\/public\">/,/<\\/Directory>/ s|AllowOverride None|AllowOverride All|' /etc/httpd/conf/httpd.conf",

      # Requireの変更
      "echo \"Setting Require to all granted...\"",
      "sudo sed -i '/<Directory \"\\/var\\/www\\/html\\/public\">/,/<\\/Directory>/ s|Require all denied|Require all granted|' /etc/httpd/conf/httpd.conf",

      # Apache設定のテスト
      "echo \"Testing Apache configuration...\"",
      "sudo apachectl configtest",

      # Apacheの再起動
      "echo \"Restarting Apache...\"",
      "sudo systemctl restart httpd",

      "echo \"Apache configuration updated successfully.\""
    ]

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
