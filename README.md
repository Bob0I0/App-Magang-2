# CRUDPertamina - Aplikasi Manajemen Surat

Aplikasi manajemen surat untuk Pertamina yang dibangun dengan Laravel 12, Livewire 4, dan TailwindCSS 4.

> **Catatan:** Aplikasi ini diberikan dalam bentuk file ZIP untuk keperluan handover.

## 📋 Daftar Isi

- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Konfigurasi](#konfigurasi)
- [Menjalankan Aplikasi](#menjalankan-aplikasi)
- [Fitur Aplikasi](#fitur-aplikasi)
- [Struktur Database](#struktur-database)
- [Troubleshooting](#troubleshooting)

## 🚀 Teknologi yang Digunakan

- **PHP** 8.2+
- **Laravel** 12
- **Livewire** 4
- **Livewire Flux** 2.9
- **Laravel Fortify** 1.30 (Authentication)
- **TailwindCSS** 4
- **Alpine.js** (via Livewire)
- **Vite** 7
- **SQLite/MySQL** (Database)

## 💻 Persyaratan Sistem

Pastikan sistem Anda memiliki:

- **PHP** versi 8.2 atau lebih tinggi
- **Composer** (PHP Dependency Manager)
- **Node.js** versi 16+ dan **NPM**
- **Database**: SQLite (default) atau MySQL
- **Web Server**: Apache/Nginx atau gunakan Laravel development server

### Cara Mengecek Versi

```bash
# Cek versi PHP
php -v

# Cek versi Composer
composer --version

# Cek versi Node.js
node -v

# Cek versi NPM
npm -v
```

## 📦 Instalasi

Ikuti langkah-langkah berikut untuk menginstal aplikasi:

### Langkah 1: Ekstrak File ZIP

Ekstrak file ZIP ke lokasi yang diinginkan, misalnya:
- `c:\laragon\www\CRUDPertamina` (jika menggunakan Laragon)
- `c:\xampp\htdocs\CRUDPertamina` (jika menggunakan XAMPP)

### Langkah 2: Buka Terminal/Command Prompt

Buka terminal dan navigasikan ke folder aplikasi:

```bash
cd c:\laragon\www\CRUDPertamina
```

### Langkah 3: Copy File Environment

Copy file `.env.example` menjadi `.env`:

```bash
# Windows (PowerShell)
copy .env.example .env

# Atau manual: copy-paste file .env.example dan rename menjadi .env
```

### Langkah 4: Install Dependencies PHP

Install semua package PHP yang diperlukan menggunakan Composer:

```bash
composer install
```

> **Catatan:** Proses ini akan membuat folder `vendor/` dan mengunduh semua dependencies Laravel.

### Langkah 5: Install Dependencies JavaScript

Install semua package JavaScript menggunakan NPM:

```bash
npm install
```

> **Catatan:** Proses ini akan membuat folder `node_modules/` dan mengunduh dependencies frontend.

### Langkah 6: Generate Application Key

Generate application key untuk Laravel:

```bash
php artisan key:generate
```

### Langkah 7: Konfigurasi Database

Buka file `.env` dan sesuaikan konfigurasi database:

#### Opsi A: Menggunakan SQLite (Recommended untuk Development)

```env
DB_CONNECTION=sqlite
# Comment atau hapus baris DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
```

Kemudian buat file database SQLite:

```bash
# Buat file database.sqlite di folder database/
type nul > database\database.sqlite
```

#### Opsi B: Menggunakan MySQL

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crudpertamina
DB_USERNAME=root
DB_PASSWORD=
```

> Pastikan database `crudpertamina` sudah dibuat di MySQL.

### Langkah 8: Jalankan Migrasi Database

Jalankan migrasi untuk membuat tabel-tabel database:

```bash
php artisan migrate
```

> Perintah ini akan membuat tabel: `users`, `jenis_surats`, `surats`, `cache`, `jobs`, `sessions`, dll.

### Langkah 9: (Opsional) Seed Data Awal

Jika ada seeder, jalankan untuk mengisi data awal:

```bash
php artisan db:seed
```

### Langkah 10: Build Asset Frontend

Compile asset frontend (CSS, JavaScript):

```bash
npm run build
```

## ⚙️ Konfigurasi

### File .env

File `.env` berisi konfigurasi penting aplikasi. Berikut penjelasan konfigurasi utama:

```env
# Informasi Aplikasi
APP_NAME=CRUDPertamina
APP_ENV=local          # local untuk development, production untuk production
APP_DEBUG=true         # true untuk development, false untuk production
APP_URL=http://localhost:8000

# Database (SQLite - Default)
DB_CONNECTION=sqlite

# Session & Cache
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database

# Mail (Log untuk development)
MAIL_MAILER=log
```

### Konfigurasi Storage

Pastikan folder storage memiliki permission yang benar:

```bash
# Windows (jalankan sebagai Administrator)
icacls storage /grant Users:F /T
icacls bootstrap\cache /grant Users:F /T
```

## 🎯 Menjalankan Aplikasi

### Mode Development

Untuk menjalankan aplikasi dalam mode development, ada beberapa cara:

#### Cara 1: Menggunakan Laravel Development Server (Recommended)

Buka **2 terminal** terpisah:

**Terminal 1 - Laravel Server:**
```bash
php artisan serve
```

**Terminal 2 - Vite Development Server (untuk hot reload CSS/JS):**
```bash
npm run dev
```

Aplikasi akan berjalan di: **http://localhost:8000**

#### Cara 2: Menggunakan Composer Script

Jalankan server, queue, dan vite sekaligus:

```bash
composer run dev
```

> **Catatan:** Membutuhkan package `concurrently` yang sudah terinstall via NPM.

#### Cara 3: Menggunakan Laragon (Jika menggunakan Laragon)

1. Buka Laragon
2. Klik "Start All"
3. Setup virtual host untuk aplikasi
4. Akses via browser: `http://crudpertamina.test`

Tetap jalankan Vite untuk development:
```bash
npm run dev
```

### Mode Production

Untuk production, build asset terlebih dahulu:

```bash
npm run build
```

Kemudian setup web server (Apache/Nginx) untuk mengarah ke folder `public/`.

## 📱 Fitur Aplikasi

### 1. **Authentication & Authorization**
- Login & Register (menggunakan Laravel Fortify)
- Password Reset
- Two-Factor Authentication (opsional)

### 2. **Dashboard**
- Statistik jumlah surat berdasarkan jenis
- Filter berdasarkan tahun
- Tampilan dinamis dari database

### 3. **Manajemen User**
- Tambah, Edit, Hapus User
- Tabel user dengan search dan pagination
- Modal untuk CRUD operations

### 4. **Manajemen Surat**

#### a. Kategori Surat (Jenis Surat)
- Pilih kategori surat (kode 52-72)
- Konfirmasi kategori yang dipilih

#### b. CRUD Surat
- **Create**: Tambah surat baru dengan upload file
- **Read**: Tampilkan list surat dengan filter kategori
- **Update**: Edit data surat
- **Delete**: Hapus surat dengan konfirmasi
- **Preview**: Lihat file surat dalam modal

#### c. Fitur Tambahan
- Search surat
- Pagination
- Upload file attachment
- Preview file dalam modal
- Filter berdasarkan jenis surat
- Validasi form menggunakan Livewire

## 🗄️ Struktur Database

### Tabel: `users`
```
- id
- name
- email
- password
- two_factor_secret (nullable)
- two_factor_recovery_codes (nullable)
- remember_token
- created_at, updated_at
```

### Tabel: `jenis_surats` (Kategori Surat)
```
- id
- nama_jenis_surat (nama/kode jenis surat, contoh: "52", "53", dll)
```

### Tabel: `surats` (Data Surat)
```
- id
- nomor_surat (unique)
- jenis_surat_id (foreign key ke jenis_surats)
- tanggal
- perihal
- file (path file upload)
- nama_asli_file
- created_at, updated_at
```

**Relasi:**
- `surats` → `jenis_surats` (Many to One)
- Cascade delete: jika jenis_surat dihapus, semua surat terkait akan terhapus

## 📂 Struktur Folder Penting

```
CRUDPertamina/
├── app/
│   ├── Livewire/          # Komponen Livewire
│   │   ├── Dashboard.php  # Dashboard dengan statistik
│   │   ├── Users/         # CRUD User
│   │   └── Surat/         # CRUD Surat
│   ├── Models/            # Eloquent Models
│   └── Http/
├── database/
│   ├── migrations/        # Database migrations
│   └── seeders/           # Database seeders
├── resources/
│   ├── views/
│   │   └── livewire/      # Blade views untuk Livewire
│   ├── css/               # CSS files
│   └── js/                # JavaScript files
├── routes/
│   ├── web.php            # Web routes
│   └── settings.php       # Settings routes
├── storage/
│   └── app/               # File uploads
├── public/                # Public assets & entry point
└── .env                   # Environment configuration
```

## 🔧 Troubleshooting

### Error: "No application encryption key has been specified"

**Solusi:**
```bash
php artisan key:generate
```

### Error: "Class not found"

**Solusi:** Clear cache dan rebuild autoload
```bash
composer dump-autoload
php artisan config:clear
php artisan cache:clear
```

### Error: Database connection failed

**Solusi:**
1. Cek konfigurasi `.env` (DB_CONNECTION, DB_DATABASE, dll)
2. Pastikan database sudah dibuat (untuk MySQL)
3. Pastikan file `database/database.sqlite` ada (untuk SQLite)

### Error: Permission denied pada folder storage

**Solusi (Windows):**
```bash
icacls storage /grant Users:F /T
icacls bootstrap\cache /grant Users:F /T
```

**Solusi (Linux/Mac):**
```bash
chmod -R 775 storage bootstrap/cache
```

### Error: Vite manifest not found

**Solusi:**
```bash
npm run build
```

### Error saat `composer install` atau `npm install`

**Solusi:**
1. Pastikan koneksi internet stabil
2. Hapus folder `vendor/` atau `node_modules/` dan coba lagi:
```bash
# Hapus dan reinstall composer
rmdir /s /q vendor
composer install

# Hapus dan reinstall npm
rmdir /s /q node_modules
npm install
```

### Reset Database (Hapus semua data dan mulai dari awal)

```bash
# Fresh migration (hapus semua tabel dan buat ulang)
php artisan migrate:fresh

# Atau dengan seeder
php artisan migrate:fresh --seed
```

### Clear All Cache

Jika mengalami masalah yang tidak jelas, clear semua cache:

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear
```

## 📝 Catatan Penting

### Yang TERMASUK dalam package ZIP:
- ✅ Source code aplikasi (PHP, Blade, JavaScript, CSS)
- ✅ File konfigurasi (composer.json, package.json, vite.config.js)
- ✅ Database migrations
- ✅ File `.env.example` (template environment)

### Yang TIDAK TERMASUK (harus install manual):
- ❌ Folder `vendor/` (dependencies PHP) → Install dengan `composer install`
- ❌ Folder `node_modules/` (dependencies JavaScript) → Install dengan `npm install`
- ❌ File `.env` (konfigurasi environment) → Copy dari `.env.example`
- ❌ File `database/database.sqlite` → Buat manual atau otomatis saat migrasi

## 🆘 Support

Jika mengalami masalah atau pertanyaan, hubungi developer/tim yang melakukan handover aplikasi ini.

---

**Selamat menggunakan aplikasi CRUDPertamina! 🎉**
