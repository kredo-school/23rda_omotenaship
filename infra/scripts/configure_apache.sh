#!/bin/bash
set -ex

# Apacheのインストール
echo "Installing Apache..."
sudo yum install -y httpd

# Apacheの起動と自動起動設定
echo "Enabling and starting Apache..."
sudo systemctl enable httpd
sudo systemctl start httpd

# DocumentRootの変更
echo "Updating DocumentRoot to /var/www/html/public..."
sudo sed -i 's|DocumentRoot "/var/www/html"|DocumentRoot "/var/www/html/public"|' /etc/httpd/conf/httpd.conf

# <Directory> ブロックのパス変更
echo "Updating <Directory> block to /var/www/html/public..."
sudo sed -i 's|<Directory "/var/www/html">|<Directory "/var/www/html/public">|' /etc/httpd/conf/httpd.conf

# AllowOverrideの変更
echo "Setting AllowOverride to All..."
sudo sed -i '/<Directory "\/var\/www\/html\/public">/,/<\/Directory>/ s|AllowOverride None|AllowOverride All|' /etc/httpd/conf/httpd.conf

# Requireの変更
echo "Setting Require to all granted..."
sudo sed -i '/<Directory "\/var\/www\/html\/public">/,/<\/Directory>/ s|Require all denied|Require all granted|' /etc/httpd/conf/httpd.conf

# Apache設定のテスト
echo "Testing Apache configuration..."
sudo apachectl configtest

# Apacheの再起動
echo "Restarting Apache..."
sudo systemctl restart httpd

echo "Apache configuration updated successfully."
