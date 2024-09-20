#!/bin/bash
set -ex

# ZIPファイルの整合性を確認する
echo "Checking the integrity of laravel-app.zip..."
zip -T /home/ec2-user/laravel-app.zip

echo "Creating laravel-app directory..."
mkdir -p /home/ec2-user/laravel-app

echo "Changing ownership and permissions..."
sudo chown -R ec2-user:ec2-user /home/ec2-user/laravel-app
sudo chmod -R 755 /home/ec2-user/laravel-app

echo "Unzipping laravel-app.zip..."
unzip -o /home/ec2-user/laravel-app.zip -d /home/ec2-user/laravel-app

echo "Removing laravel-app.zip..."
rm /home/ec2-user/laravel-app.zip

echo "Unzip completed successfully."
