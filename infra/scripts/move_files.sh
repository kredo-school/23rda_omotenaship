#!/bin/bash
set -ex

echo "Checking if /var/www/html exists..."
if [ ! -d /var/www/html ]; then sudo mkdir -p /var/www/html; fi

echo "Setting ownership and permissions..."
sudo chown -R ec2-user:ec2-user /var/www/html
sudo chmod -R 755 /var/www/html

echo "Moving non-hidden files..."
sudo mv /home/ec2-user/laravel-app/* /var/www/html/

echo "Moving hidden files..."
sudo mv /home/ec2-user/laravel-app/.[!.]* /var/www/html/

echo "Removing source directory..."
sudo rmdir /home/ec2-user/laravel-app
