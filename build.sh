#!/bin/bash
. ~/.nvm/nvm.sh

git pull origin master
nvm use 9.2.0
npm run build
php artisan view:clear
php artisan cache:clear
php artisan route:clear
php artisan queue:flush
php artisan config:clear
php artisan optimize
php artisan inspire