#!/bin/bash

echo ""
echo "My Command Line Installer"
echo "\n"

echo "Copy .env \n"
cp .env.example .env


artisan="/usr/local/bin/php /var/www/artisan"
$artisan down
$artisan cache:clear

$artisan config:clear
$artisan config:cache

$artisan event:clear
$artisan event:cache

$artisan route:clear
$artisan view:clear

$artisan key:generate

$artisan up

composer install

php artisan migrate
php artisan migrate:refresh


php artisan app:import 'https://www.pornhub.com/files/json_feed_pornstars.json' 'import/files/import.json'

echo ""
echo "Installation complete."
echo ""

# Exit from the script with success (0)
exit 0
