# 📌 Aplikasi Kelola Produk

Aplikasi web sederhana berbasis **Laravel 10** yang digunakan untuk mengelola data (CRUD).

---

## 📖 Deskripsi Aplikasi

Aplikasi ini memiliki fitur utama:

-   Authentikasi
-   Menampilkan data
-   Menambahkan data
-   Mengubah data
-   Menghapus data
-   Pencarian dan filter data

Aplikasi dirancang dengan struktur yang rapi, mudah dipahami, dan terdokumentasi dengan baik.

---

## 🛠️ Teknologi yang Digunakan

### Backend

-   PHP **8.1**
-   Laravel **10**
-   MySQL

### Frontend

-   HTML
-   CSS
-   JavaScript
-   Bootstrap / Admin Template
-   jQuery

---

## 🗄️ Database

**Database:** MySQL  
**Nama Database:** `happy_puppy`

Contoh tabel:

-   `users`
-   `produk`

Struktur tabel didefinisikan melalui **Laravel Migration**.

---

## ⚙️ Cara Instalasi

### 1️⃣ Clone Repository

```bash
git clone https://github.com/jihan69cahya/tes_happy_puppy_web.git atau extract project

cd nama-project

composer install

cp .env.example .env

APP_NAME=LaravelApp
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=happy_puppy
DB_USERNAME=root
DB_PASSWORD=

php artisan key:generate

php artisan migrate

php artisan db:seed UserSeeder

php artisan serve

http://127.0.0.1:8000

```
