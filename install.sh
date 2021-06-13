#!/bin/zsh
composer install
php artisan migrate:fresh
php artisan db:seed --class=DatabaseSeeder
php artisan db:seed --class=MenuSeeder
php artisan db:seed --class=MenuItemSeeder
php artisan db:seed --class=HomeSeeder
php artisan voyager:install
php artisan voyager:admin admin@admin.it
php artisan tagging:create-group skill
