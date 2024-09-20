#!/bin/bash
echo "Creating laravel-app directory..."
mkdir -p /home/ec2-user/laravel-app

echo "Unzipping laravel-app.zip..."
unzip /home/ec2-user/laravel-app.zip -d /home/ec2-user/laravel-app

echo "Removing laravel-app.zip..."
rm /home/ec2-user/laravel-app.zip
