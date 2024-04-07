
# Laravel 11 Simple Auth App


Repository ini berisi aplikasi web sederhana yang dikembangkan menggunakan Laravel 11. Aplikasi ini menyediakan fitur login, register, dan halaman utama (home). Penggunaan fitur otentikasi bawaan Laravel 11 mempermudah pengelolaan otentikasi pengguna.

## Instalasi


Clone Repository


```bash
git clone https://github.com/izzamoe/LoginRegisterLaravel11.git
```

### Masuk ke directory
Clone repository ini ke dalam mesin lokal Anda dengan menjalankan perintah berikut di terminal:

```bash
  cd LoginRegisterLaravel11
```

### Install dependencies

```bash
  composer install
```
### Konfigurasi File .env

Salin file .env.example menjadi .env:

```bash
  cp .env.example .env
```
Buka file .env yang baru dan atur konfigurasi database sesuai dengan lingkungan Anda:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username_database
DB_PASSWORD=password_database
```
Pastikan untuk mengganti nama_database, username_database, dan password_database dengan informasi koneksi database Anda yang sesuai.


### Migrasi database

```bash
  php artisan migrate
```

### Mulai Aplikasi

```bash
  php artisan serve
```

