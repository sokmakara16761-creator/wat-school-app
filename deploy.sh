#!/bin/bash
# Deployment script for Wat & Buddhist School Application

echo ">>> Starting deployment..."

# 1. Turn on maintenance mode
php artisan down || true

# 2. Pull latest code (if using git)
# git pull origin main

# 3. Install composer dependencies (no dev)
composer install --no-dev --optimize-autoloader

# 4. Clear and Cache Configurations, Routes, and Views
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# 5. Run Database Migrations
php artisan migrate --force

# 6. Ensure storage directory link is created and permissions set
php artisan storage:link || true
chmod -R 775 storage bootstrap/cache
chmod -R 777 database

# 7. Turn off maintenance mode
php artisan up

echo ">>> Deployment completed successfully!"
