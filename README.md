<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Membuat Fitur Login Dengan Laravel

Membuat rangkaian sistem login menggunakan framework "Laravel", project ini bertujuan untuk login dengan menggunakan sistem verifikasi OTP via email.

## Fitur

Fitur yg terdapat dalam sistem login, yaitu:
1. Login/Registrasi (Membuat akun baru).
2. Registrasi menggunakan verifikasi email.
3. Terdapat CRUD (create, read, update, delete) user,untuk superadmin.

### Cara instalasi

## Prasyarat
Sebelum memulai, pastikan sudah terinstall di komputer Anda:
- **PHP** ^8.2
- **Composer**
- **MySQL/MariaDB**
- **Node.js & NPM**

## Instalasi Laravel-12

1. **Clone repository**
   ```bash
   git clone https://github.com/username/nama-project.git
   cd nama-project

2. **Install dependency Laravel**
   ```bash
   composer instal

3. **Copy file environment**
   ```bash
   cp .env.example .env

4. **Generate application key**
   ```bash
   php artisan key:generate

5. **Jalankan migrasi database**
   ```bash
   php artisan migrate --seed

6. **Install dependency frontend**
   ```bash
   npm install && npm run dev

7. **Jalankan server lokal**
   ```bash
   php artisan serve


