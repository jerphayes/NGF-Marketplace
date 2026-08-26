#!/bin/sh
set -e

php artisan migrate --force

php artisan config:cache
php artisan route:cache
php artisan view:cache

php artisan storage:link >/dev/null 2>&1 || true

mkdir -p storage/app
chown -R www-data:www-data storage bootstrap/cache

php-fpm -D
exec nginx -g 'daemon off;'
