echo 'Start deploy'

echo 'cd'; cd /var/www/html/platita

echo 'git pull'; git pull origin main

echo 'composer install'; composer install

echo 'npm install'; npm install

echo 'npm run build'; npm run build

echo 'chown'; chown -R www-data:www-data /var/www/html/platita

echo 'artisan route:clear'; php artisan route:clear

echo 'php reload'; systemctl reload php8.2-fpm

echo 'Deploy completed'