#!/bin/bash
set -ex

# データベース接続情報
DB_HOST=$1
DB_USERNAME=$2
DB_PASSWORD=$3
echo "DB_HOST: ${DB_HOST}"
echo "DB_USERNAME: ${DB_USERNAME}"
echo "DB_PASSWORD: ${DB_PASSWORD}"

echo "Navigating to Laravel application directory..."
cd /var/www/html/public

# 既存のnode_modulesを完全に削除
echo "Removing existing node_modules directory..."
rm -rf node_modules

# 既存のシンボリックリンクが存在する場合は削除
echo "Removing existing .bin directory links..."
rm -f .bin/*

echo "Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader

echo "Installing npm dependencies..."
export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"
nvm use 18
npm ci # クリーンインストール

echo "Building frontend assets..."
npm run production

echo "Creating .env file..."
cp .env.example .env

echo "Generating application key..."
php artisan key:generate

echo "Setting environment variables..."
sed -i 's/APP_ENV=local/APP_ENV=production/' .env
sed -i 's/APP_DEBUG=true/APP_DEBUG=false/' .env
sed -i 's/DB_HOST=127.0.0.1/DB_HOST='"${DB_HOST}"'/' .env
sed -i 's/DB_DATABASE=laravel/DB_DATABASE=laravel_db/' .env
sed -i 's/DB_USERNAME=root/DB_USERNAME='"${DB_USERNAME}"'/' .env
sed -i 's/DB_PASSWORD=/DB_PASSWORD='"${DB_PASSWORD}"'/' .env

echo "Running database migrations..."
php artisan migrate --force

echo "Seeding database..."
php artisan db:seed --force

echo "Caching configuration..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Caching views..."
php artisan view:cache

echo "Setting ownership and permissions for storage and cache directories..."
sudo chown -R apache:apache /var/www/html/storage
sudo chown -R apache:apache /var/www/html/bootstrap/cache
sudo chmod -R 775 /var/www/html/storage
sudo chmod -R 775 /var/www/html/bootstrap/cache
echo "Ownership and permissions set successfully."

echo "Laravel setup completed successfully."
