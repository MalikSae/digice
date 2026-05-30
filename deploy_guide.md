# 1. Masuk SSH
ssh -p 65002 u585715077@145.79.14.106

# 2. Set PHP
export PATH=/opt/alt/php83/usr/bin:$PATH

# 3. Masuk ke folder project
cd ~/domains/digice.net/public_html

# 4. Pull update dari GitHub
git pull origin main

# 5. Install dependency baru (jika ada perubahan composer.json)
php -d memory_limit=-1 /usr/local/bin/composer install --no-dev --optimize-autoloader

# 6. Jalankan migration baru (jika ada)
php artisan migrate --force

# 7. Clear & rebuild cache
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan optimize

## Kalau ada perubahan CSS/JS, tambahkan ini di lokal dulu sebelum SSH:
# Di lokal
npm run build

# Upload build ke server
scp -P 65002 -r ./public/build u585715077@145.79.14.106:/home/u585715077/domains/digice.net/public_html/public/