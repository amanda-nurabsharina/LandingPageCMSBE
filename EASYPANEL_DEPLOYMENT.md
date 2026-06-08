# PANDUAN DEPLOYMENT - LARAVEL & REACT KE EASYPANEL (DOCKER-BASED)

Panduan ini menjelaskan langkah demi langkah untuk menyebarkan (deploy) proyek **PrintHub** (Laravel Backend & React Frontend) ke VPS menggunakan **Easypanel** (Panel kontrol modern berbasis Docker).

Secara garis besar, kita akan membuat 3 service di Easypanel:
1. **Database Service**: MySQL (untuk backend).
2. **Backend App Service**: Laravel 11 (untuk API dan admin panel Filament).
3. **Frontend App Service**: React + Vite (untuk landing page).

---

## PRASYARAT
Sebelum memulai, pastikan:
* Anda memiliki VPS yang sudah terinstall **Easypanel** dan domain yang terhubung ke IP VPS tersebut.
* Proyek **BE LP** (Backend) dan **FE LP** (Frontend) sudah di-push ke repository **GitHub** Anda (bisa berupa 2 repo terpisah atau 1 monorepo).
* Anda sudah menghubungkan akun **GitHub** Anda ke Easypanel.

---

## LANGKAH 1: BUAT PROJECT & DATABASE DI EASYPANEL

1. Masuk ke dashboard Easypanel Anda.
2. Klik tombol **Create Project** di kanan atas. Beri nama project, misalnya: `printhub`.
3. Di dalam project `printhub`, klik **Services** -> **Database** -> Pilih **MySQL** (atau PostgreSQL).
4. Beri nama service database, misalnya: `mysql-db`.
5. Easypanel akan membuat database baru dan secara otomatis mengisi kredensial database di bagian **Environment Variables** database tersebut. Catat kredensial ini:
   - `DB_HOST` (biasanya nama service, yaitu `mysql-db`)
   - `DB_PORT` (`3306`)
   - `DB_DATABASE` (contoh: `easypanel`)
   - `DB_USERNAME` (contoh: `easypanel`)
   - `DB_PASSWORD` (password acak dari Easypanel)

---

## LANGKAH 2: DEPLOY LARAVEL BACKEND (BE LP)

1. Di dalam project yang sama, klik **New Service** -> **App**. Beri nama, misalnya: `printhub-api`.
2. Pada tab **Source**:
   - Pilih **GitHub**.
   - Pilih Repository backend Anda (`BE LP`).
   - Pilih Branch utama (misalnya: `main` atau `master`).
3. Pada tab **Build**:
   - Ubah Build Method menjadi **Nixpacks** (Easypanel akan otomatis mendeteksi konfigurasi Laravel secara pintar).
4. Pada tab **Environment Variables**, tambahkan konfigurasi berikut:
   ```env
   APP_NAME=PrintHub
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://api.yourdomain.com  # Sesuaikan dengan domain API Anda
   APP_KEY=base64:D8pxDzLNFHmi+v/k3c9ygVNGX8+dGxx1id3P28/3yJ0= # Gunakan APP_KEY Anda
   
   DB_CONNECTION=mysql
   DB_HOST=mysql-db                   # Samakan dengan nama service MySQL Easypanel
   DB_PORT=3306
   DB_DATABASE=easypanel              # Samakan dengan konfigurasi database
   DB_USERNAME=easypanel
   DB_PASSWORD=password_dari_easypanel
   
   # Optimalisasi PHP untuk Production
   PHP_OPCACHE_ENABLED=true
   ```
5. **CRITICAL: Atur Persistent Volume (Penting untuk upload file)**:
   Karena Docker bersifat *stateless* (file yang di-upload akan hilang setiap kali dideploy ulang), kita wajib membuat volume penyimpanan permanen.
   - Pergi ke tab **Storage** -> klik **Add Volume**.
   - Isi **Name**: `storage-vol`.
   - Isi **Mount Path**: `/app/storage/app/public`.
   *(Langkah ini memastikan logo, foto banner, dan portofolio yang diunggah admin tersimpan aman).*
6. **Atur Start Command (Migrasi & Seed)**:
   Agar database ter-update dan data default (termasuk menu landing page) di-seed secara otomatis setiap kali build baru aktif:
   - Pergi ke tab **Build** -> scroll ke **Start Command**.
   - Isi Start Command dengan:
     ```bash
     php artisan migrate --force && php artisan db:seed --force && php artisan storage:link && php artisan serve --host=0.0.0.0 --port=80
     ```
7. Pada tab **Domains**:
   - Tambahkan domain/subdomain untuk API Anda, misalnya: `api.yourdomain.com`.
   - Easypanel akan secara otomatis mengurus sertifikat SSL (HTTPS) gratis dari Let's Encrypt.
8. Klik **Deploy**. Tunggu hingga build selesai dan statusnya berubah menjadi **Running**.

---

## LANGKAH 3: DEPLOY REACT FRONTEND (FE LP)

1. Di dalam project yang sama, klik **New Service** -> **App**. Beri nama, misalnya: `printhub-fe`.
2. Pada tab **Source**:
   - Pilih **GitHub**.
   - Pilih Repository frontend Anda (`FE LP`).
   - Pilih Branch utama.
3. Pada tab **Build**:
   - Pilih **Nixpacks** (Nixpacks akan mendeteksi React Vite, menjalankan `npm run build`, dan mengonfigurasi static web server otomatis).
4. Pada tab **Environment Variables**, tambahkan URL API backend Anda:
   ```env
   VITE_API_BASE_URL=https://api.yourdomain.com  # Pastikan mengarah ke domain backend Anda
   ```
5. Pada tab **Domains**:
   - Tambahkan domain utama Anda, misalnya: `yourdomain.com`.
6. Klik **Deploy**. Tunggu beberapa menit hingga status berubah menjadi **Running**.

---

## LANGKAH 4: VERIFIKASI DEPLOYMENT

1. Buka domain utama Anda di browser (`https://yourdomain.com`).
2. Pastikan landing page dimuat dengan indah dan mengambil data dari backend secara dinamis.
3. Akses admin panel di subdomain API (`https://api.yourdomain.com/admin`).
4. Login menggunakan akun admin Anda (email: `admin@example.com`, password: `password`).
5. Uji fungsionalitas berikut:
   - Ubah urutan menu di menu **Urutan & Aktifasi Menu**, lalu periksa apakah urutan di landing page langsung ter-update.
   - Upload gambar baru (misalnya logo atau gambar portofolio), lalu pastikan gambar tersebut tampil dengan benar dan tidak rusak/hilang saat service di-restart.

---

## PENGATURAN TAMBAHAN (CORS & FILE SIZE LIMITS)

### 1. Masalah CORS (Cross-Origin Resource Sharing)
Jika landing page Anda gagal memuat data dan konsol browser menunjukkan error CORS, pastikan middleware CORS di Laravel sudah mengizinkan domain frontend Anda. Edit `config/cors.php` (jika ada) atau setup di middleware `bootstrap/app.php` untuk memperbolehkan domain `https://yourdomain.com`.

### 2. Menaikkan Limit Upload File PHP di Easypanel
Secara default, PHP membatasi upload file hingga 2MB. Jika ingin menaikkan limit untuk upload gambar beresolusi tinggi:
* Pada service backend `printhub-api` -> pergi ke tab **Environment Variables**.
* Tambahkan variabel:
  - `PHP_UPLOAD_MAX_FILESIZE=20M`
  - `PHP_POST_MAX_SIZE=25M`
* Klik **Save** & **Redeploy**.
