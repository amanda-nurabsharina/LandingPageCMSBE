# PrintHub CMS - Backend API & Admin Panel

Repository ini berisi kode sumber backend untuk **PrintHub**, sebuah aplikasi CMS Landing Page jasa percetakan digital premium. Backend dibangun menggunakan **Laravel 11** terintegrasi dengan **Filament v3** sebagai admin panel untuk mengelola seluruh konten secara dinamis.

---

## 1. Prasyarat Sistem (System Requirements)

Sebelum memulai, pastikan sistem Anda telah terinstal:
- **PHP >= 8.3**
- **Composer**
- **Node.js & NPM**
- **SQLite** (opsional, jika ingin menggunakan database default yang praktis) atau **MySQL**

---

## 2. Persiapan Database (Database Preparation)

Backend ini dikonfigurasi menggunakan **SQLite** secara default agar pembeli dapat langsung menjalankan aplikasi secara lokal tanpa perlu menginstal dan membuat database di MySQL Server. 

### Langkah-langkah Persiapan Database:

1. **Salin file konfigurasi environment**:
   ```bash
   copy .env.example .env
   ```

2. **Buat file database SQLite**:
   Secara default, Laravel akan membaca database SQLite pada path `database/database.sqlite`. Silakan buat file tersebut melalui terminal:
   - **Windows PowerShell**:
     ```powershell
     New-Item -Path "database/database.sqlite" -ItemType File
     ```
   - **Linux / macOS / Git Bash**:
     ```bash
     touch database/database.sqlite
     ```

3. **Verifikasi konfigurasi `.env`**:
   Pastikan variabel database di file `.env` terkonfigurasi seperti berikut:
   ```env
   DB_CONNECTION=sqlite
   ```

4. **Jalankan Migrasi & Database Seeder**:
   Jalankan perintah berikut untuk membuat tabel-tabel database dan membuat akun Administrator default:
   ```bash
   php artisan migrate:fresh --seed
   ```

---

## 3. Cara Menjalankan Aplikasi di Lokal (Run Local)

Ikuti instruksi di bawah ini untuk menginstal semua dependency dan menjalankan server lokal:

1. **Instal dependency PHP**:
   ```bash
   composer install
   ```

2. **Buat Application Key**:
   ```bash
   php artisan key:generate
   ```

3. **Instal dependency Javascript & Build Assets**:
   ```bash
   npm install
   ```
   Untuk memproduksi asset production (styles & scripts Filament):
   ```bash
   npm run build
   ```

4. **Jalankan Development Server**:
   Anda dapat menjalankan server menggunakan Artisan:
   ```bash
   php artisan serve
   ```
   Aplikasi backend Anda sekarang berjalan di: **[http://127.0.0.1:8000](http://127.0.0.1:8000)**.
   
   *Tip: Proyek ini juga menyediakan script kombinasi server Laravel & frontend Vite secara simultan:*
   ```bash
   npm run dev
   ```

---

## 4. Panduan Pemakaian & Dokumen Manual Admin Panel

Backend ini menggunakan **Filament v3**, sebuah panel admin modern yang sangat responsif dan aman untuk mengelola data REST API yang akan dikonsumsi oleh Landing Page Frontend.

### Kredensial Login Default (Seeded):
Setelah Anda menjalankan `php artisan db:seed`, Anda dapat masuk menggunakan akun berikut:
- **URL Admin Panel**: `http://127.0.0.1:8000/admin`
- **Email**: `admin@example.com`
- **Password**: `password`

*(Catatan: Segera ubah email dan password di panel admin setelah pertama kali login demi alasan keamanan)*

### Modul Pengelolaan Konten (CMS):

Di dalam panel admin, terdapat 8 modul utama yang dapat dikelola dengan mudah:

1. **Site Config (Pengaturan Umum)**
   - Mengatur nama situs, logo cetak, nomor WhatsApp utama, email, alamat fisik, dan tautan sosial media (Facebook, Instagram, Twitter).
   - *Penting*: Semua link WhatsApp di frontend akan merujuk ke nomor WhatsApp yang dimasukkan di sini secara otomatis. Gunakan format internasional (contoh: `628123456789`).

2. **Hero Section (Bagian Utama)**
   - Mengubah badge teks promosi di bagian atas halaman.
   - Mengubah judul utama (Headline), sub-judul (Sub-headline), teks tombol utama, teks tombol sekunder, serta gambar banner utama di sisi kanan halaman hero.

3. **Why Choose Us (Keunggulan)**
   - Mengelola teks keunggulan perusahaan.
   - Mengatur poin-poin keuntungan (fitur/kelebihan) dalam bentuk checklist dinamis.
   - Mengunggah foto ilustrasi pendukung keunggulan.

4. **Services (Layanan Cetak)**
   - Menambahkan jenis layanan percetakan baru (contoh: Cetak Spanduk, Brosur, Stiker).
   - Menentukan ikon representatif untuk masing-masing layanan menggunakan nama ikon dari **Lucide Icons** (seperti `printer`, `tag`, `file-text`, `credit-card`, `package`, `gift`).
   - Mengatur urutan tampil (*sort order*) layanan.

5. **Statistics (Statistik)**
   - Mengatur angka/pencapaian perusahaan (seperti "500+ Klien Puas", "5 Tahun Pengalaman") untuk meningkatkan kepercayaan pembeli (*social proof*).

6. **Order Steps (Alur Pemesanan)**
   - Membuat langkah-langkah alur pemesanan dari konsultasi hingga barang siap kirim.
   - Setiap langkah dapat disesuaikan judul, deskripsi singkat, nomor urut, dan ikon pendukungnya.

7. **Portfolios (Galeri Cetak)**
   - Mengunggah foto-foto hasil cetakan sampel.
   - Mengelompokkan berdasarkan kategori (seperti Stiker, Kartu Nama, Brosur, Banner) untuk filter otomatis di frontend.

8. **Testimonials (Ulasan Pelanggan)**
   - Menampilkan ulasan positif pelanggan setia lengkap dengan rating bintang (1-5), nama pelanggan, dan pekerjaannya.

---

## 5. Integrasi API dengan Frontend

Backend ini menyediakan endpoint API publik siap pakai:
- **Endpoint**: `GET /api/landing-page`
- **Response Format**: JSON berisi seluruh data konfigurasi situs, hero section, keunggulan, statistik, layanan, alur pemesanan, portofolio, dan ulasan pelanggan secara real-time.
