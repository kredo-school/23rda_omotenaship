#!/bin/bash
set -ex

# プロジェクトのルートディレクトリに移動
PROJECT_ROOT="$(dirname "$1")/../.."
cd "$PROJECT_ROOT"

# 既存のファイルを削除
echo "Removing existing laravel-app.zip..."
rm -f "${1}/infra/terraform/laravel-app.zip"

# .git ディレクトリと terraform ディレクトリを除外して zip を作成
echo "Creating laravel-app.zip..."
zip -r "${1}/infra/terraform/laravel-app.zip" . -x "${1}/infra/terraform/*"

# 作成した zip ファイルの整合性を確認
echo "Checking the integrity of laravel-app.zip..."
zip -T "${1}/infra/terraform/laravel-app.zip"

echo 'Zip file created successfully'
