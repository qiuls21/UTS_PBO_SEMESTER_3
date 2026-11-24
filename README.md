# UTS PBO - Sistem Inventaris Barang (Laravel)

Aplikasi CRUD data barang menggunakan Laravel dengan pola Route, Controller, Blade.
Data disimpan di session tanpa database.

## Identitas
- Nama : Rizki Maulana
- NIM  : 20251020046
- Mata Kuliah : Pemrograman Berorientasi Objek

## Persyaratan
- PHP 
- Composer

## Menjalankan
1. Clone repository
   git clone https://github.com/qiuls21/UTS_PBO_SEMESTER_3.git
   cd uts-pbo-laravel
2. Install dependency
   composer install
3. Salin file environment
   cp .env.example .env
   (di Windows PowerShell: copy .env.example .env)
4. Generate app key
   php artisan key:generate
5. Pastikan SESSION_DRIVER=file di file .env
6. Jalankan server
   php artisan serve
7. Buka http://127.0.0.1:8000/barang

## Fitur
- Daftar, tambah, detail, edit, dan hapus barang
- Validasi form dengan pesan bahasa Indonesia
- Notifikasi sukses dan gagal
- Konfirmasi sebelum hapus

## Struktur File Utama
- routes/web.php : definisi route
- app/Http/Controllers/BarangController.php : logika CRUD
- resources/views/layouts/app.blade.php : layout utama
- resources/views/barang/ : halaman daftar, detail, tambah, edit