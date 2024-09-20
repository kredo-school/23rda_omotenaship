#!/bin/bash
set -ex

zip -r "${1}/laravel-app.zip" ../../ -x '../../infra/terraform/*'
ls -l "${1}/laravel-app.zip"
echo 'Zip file created successfully'
