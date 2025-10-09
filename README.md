<h1 align='center'>Welcome! #Fullstack Talenavi 🚀</h1>

# Requirements
## Languages
> [<img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" />![version](https://img.shields.io/badge/version-8.2.12-blue)](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.2.12/xampp-windows-x64-8.2.12-0-VS16-installer.exe/download) </br>
> [<img src="https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white" />![version](https://img.shields.io/badge/version-3.7.1-blue)](https://cdnjs.com/libraries/jquery) </br>

## Frontend
> [<img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" />![version](https://img.shields.io/badge/version-1.7-blue)](https://tailwindcss.com/docs/guides/vite#vue) </br>
> [<img src="https://img.shields.io/badge/Font_Awesome-339AF0?style=for-the-badge&logo=fontawesome&logoColor=white" />![version](https://img.shields.io/badge/version-6.5.2-blue)](https://cdnjs.com/libraries/font-awesome) </br>

## Database
> [<img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" />![version](https://img.shields.io/badge/version-8.0.39-blue)](https://dev.mysql.com/downloads/installer/) </br>
> [<img src="https://img.shields.io/badge/PostgreSQL-316192?style=for-the-badge&logo=postgresql&logoColor=white" />![version](https://img.shields.io/badge/version-17.2-blue)](https://www.enterprisedb.com/downloads/postgres-postgresql-downloads) </br>

## Tools
> [<img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" />![version](https://img.shields.io/badge/version-11.xx-blue)](https://laravel.com/docs/11.x/installation) </br>
> [<img src="https://img.shields.io/badge/Node%20js-339933?style=for-the-badge&logo=nodedotjs&logoColor=white" />![version](https://img.shields.io/badge/version-21.7.1-blue)](https://nodejs.org/en/download/prebuilt-installer) </br>
> [<img src="https://img.shields.io/badge/Docker-2CA5E0?style=for-the-badge&logo=docker&logoColor=white" />![version](https://img.shields.io/badge/version-4.31.1-blue)](https://www.docker.com/get-started/) </br>

# Library / CDN
> [![AlpineJS]](https://alpinejs.dev/essentials/installation) </br>
> [![JQuery UI]](https://jqueryui.com) </br>
> [![MomentJS]](https://momentjs.com) </br>
> [![NotyJS]](https://www.jsdelivr.com/package/npm/noty) </br>
> [![Sweetalert]](https://sweetalert2.github.io) </br>
> [![tostr]](https://www.jsdelivr.com/package/npm/toastr) </br>
> [![DataTables]](https://datatables.net/download/) </br>
> [![AG Grid]](https://www.ag-grid.com/javascript-data-grid/getting-started/) / [![AG Grid Theme Builder]](https://www.ag-grid.com/theme-builder/) </br>
> [![ListJS]](https://listjs.com/overview/download/) </br>
> [![Flaticon]](https://www.flaticon.com/search?color=color) </br>

# Database / Table Relation
- Untuk mengetahui relasi antar table, bisa mengakses website berikut;
> [![dbdiagram]](https://dbdiagram.io/d) </br>
- Jika sudah login menggunakan akun pribadi, bisa menggunakan code yang sudah disiapkan pada file berikut
> [![database/TableRelation.txt]](https://github.com/skuadolan/fullstack-laravel/tree/main/database/TableRelation.txt) </br>

# Project Worklist
> [![notion]](https://www.notion.so/skuadproduction/Fullstack-Klinik-fd00424e9f0f4871996679934edb861a) </br>

# Setup
## Environment
> .env
- Bisa disesuaikan dengan database yang ingin digunakan di perangkat `mesin lokal` atau `docker`
- `DB_HOST` dapat menyesuaikan yang ingin digunakan di perangkat `mesin lokal` atau `docker`
```bash
DB_COLLATION=utf8mb4_general_ci # Gunakan jika di CPanel Server version: 10.6.17-MariaDB-cll-lve - MariaDB Server

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

> php.ini
```bash
extension=pdo_pgsql
extension=pgsql
```

## Composer
> [![Composer]](https://getcomposer.org/download/) </br>
```bash
composer i
```
```bash
composer update laravel/framework
```

## Application
> Database
- Pastikan database sudah dibuatkan/create

> Laravel
```bash
php artisan key:generate
```
- `php artisan migrate:fresh --seed` merupakan promp / command untuk development tanpa connect db client
```bash
php artisan migrate:fresh --seed
```
```bash
php artisan config:publish cors
```

> TailwindCSS
- Pastikan sudah installasi `pnpm`, jika belum install bisa ikuti berikut
```bash
npm i -g pnpm
```
- Install library dari nodejs
```bash
pnpm i
```

# Running Development
> Laravel
```bash
php artisan serve
```
> TailwindCSS
```bash
pnpm dev
```

# Running Production
> Laravel
- Setting pada root document di folder `public`

> TailwindCSS
```bash
pnpm build
```

## Docker
- Jangan lupa untuk merubah `ports` pada file `docker-compose.yml` untuk disesuaikan di perangkat masing - masing supaya tidak `error`
```bash
ports:
      - "3306:3306" # *Contoh customize_port:default_service_port
```
- Pastikan value `.env` sudah sama dengan konfigurasi `docker-compose.yml`
- Mengaktifkan mesin docker, dan pastikan operasi build berhasil sampai akhir
```bash
docker-compose up -d
```

> .env
```bash
DB_CONNECTION=pgsql
DB_HOST=laravel_postgres
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=postgres
DB_PASSWORD=1234
```

- Jika running menggunakan `php artisan serve` maka `postgres` menggunakan
```bash
DB_HOST=localhost
```

- Jika running menggunakan `nginx docker` maka `postgres local` menggunakan
```bash
DB_HOST=host.docker.internal
```

- Jika running menggunakan `postgres docker` menggunakan
```bash
DB_HOST=laravel_postgres
```

> Permission denied
- Jika terdapat `Permission denied` terhadap suatu direktori folder, cobalah untuk `composer install` menggunakan docker


## Redis Docker
- Dan pada container redis run promp berikut
```bash
redis-cli FLUSHALL
```

```bash
SESSION_DRIVER=redis
SESSION_CONNECTION=default
CACHE_DRIVER=redis

REDIS_CLIENT=phpredis
REDIS_HOST=laravel_redis
REDIS_PORT=6379
```

- Jika running menggunakan `php artisan serve` maka `redis` menggunakan
```bash
REDIS_CLIENT=predis
```

- Jika running menggunakan `nginx docker` maka `redis` menggunakan
```bash
REDIS_CLIENT=phpredis
```

- Jangan lupa untuk run prompt berikut ini;
```bash
php artisan auth:clear-resets
```
```bash
php artisan cache:clear
```
```bash
php artisan config:clear
```
```bash
php artisan event:clear
```
```bash
php artisan optimize:clear
```
```bash
php artisan queue:clear
```
```bash
php artisan route:clear
```
```bash
php artisan schedule:clear-cache
```
```bash
php artisan view:clear
```

# cPanel
Jika setting cPanel, pastikan seluruh `.env` yang berkaitan dengan `domain` semua localhost diganti menjadi `current domain` atau `domain` yang sedang digunakan di hosting.

# IMPORTANCE!
- Jika menggunakan query, pastikan nama table tidak menggunakan huruf besar!
