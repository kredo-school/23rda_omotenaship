# !/bin/bash
zip -r "${1}/laravel-app.zip" ../../ -x '../../infra/terraform/*'
ls -l "${1}/laravel-app.zip"
echo 'Zip file created successfully'
