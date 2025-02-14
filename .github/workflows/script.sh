echo '==> Start deploy'

echo '==> cd'; cd /var/www/html/platita

echo '==> git pull'; git restore .;git pull origin main

echo '==> composer install'; sudo -u www-data composer install

echo '==> npm install'; npm install

echo '==> npm run build'; npm run build

echo '==> chown / chmod';
chown -R www-data:www-data /var/www/html/platita;
chmod -R 755 /var/www/html/platita;
chmod -R 775 /var/www/html/platita/storage;
chmod -R 775 /var/www/html/platita/bootstrap/cache;

echo '==> artisan route:clear'; php artisan route:clear

echo '==> php reload'; systemctl reload php8.2-fpm

echo '==> Deploy completed'
