# Xeno Employees

## Prasyarat

Pastikan Anda telah menginstal Node.js LTS, PHP, dan Composer.

## Cara Menjalankan

Ikuti langkah-langkah berikut untuk menjalankan proyek ini:

```sh
cp .env.example .env
php artisan migrate --seed
npm i && npm run build
composer run dev
````

## User untuk Login
Email: john.doe@example.com
Password: password