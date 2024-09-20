#!/bin/bash
set -ex

# EPELリポジトリの有効化
echo "Enabling EPEL repository..."
sudo amazon-linux-extras install -y epel

# PHP 8.2のインストール
echo "Installing PHP 8.2 and necessary extensions..."
sudo amazon-linux-extras install -y php8.2
sudo yum install -y php-cli php-mbstring php-xml php-pdo php-mysqlnd

# PHPバージョンの確認
echo "Verifying PHP version..."
php -v

# nvmのインストール
echo "Installing NVM (Node Version Manager)..."
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash

# nvmの環境設定とNode.js 18のインストール
echo "Configuring NVM..."
export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"

echo "Installing Node.js 18..."
nvm install 18
nvm use 18
nvm alias default 18

# Composerのインストール
echo "Installing Composer..."
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
HASH="$(wget -q -O - https://composer.github.io/installer.sig)"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"
