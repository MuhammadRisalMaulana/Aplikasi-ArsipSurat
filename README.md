# Aplikasi Arsip Surat

![Laravel](https://img.shields.io/badge/Laravel-9.x-red)
![PHP](https://img.shields.io/badge/PHP-8.1-blue)
![License](https://img.shields.io/badge/License-MIT-green)

---

## Deskripsi
Aplikasi Arsip Surat adalah sistem informasi berbasis web yang dibangun menggunakan **Laravel**.  
Aplikasi ini memudahkan pengelolaan dokumen dan surat di instansi atau organisasi secara digital, sehingga proses arsip menjadi lebih cepat, rapi, dan aman.

---

## Tujuan
1. Mengurangi penggunaan arsip fisik dan kertas.
2. Mempermudah pencarian dan pengelolaan surat.
3. Menyediakan fitur unggah, arsip, edit, hapus, dan unduh surat.
4. Memberikan tampilan yang user-friendly dan responsif.

---

## Fitur
| Fitur           | Deskripsi                                          |
|-----------------|----------------------------------------------------|
| Unggah Surat    | Upload surat PDF ke sistem                         |
| Arsipkan Surat  | Arsip surat berdasarkan kategori                   |
| Edit / Hapus    | Ubah data atau hapus arsip dengan konfirmasi       |
| Lihat Surat     | Preview surat langsung di browser                  |
| Unduh Surat     | Download arsip dalam format PDF                    |
| Pencarian       | Cari arsip berdasarkan nomor, judul, atau kategori |

---

## 🛠 Instalasi

1. Clone repository:
git clone https://github.com/MuhammadRisalMaulana/Aplikasi-ArsipSurat.git
Masuk ke folder project:

cd Aplikasi-ArsipSurat
Install dependencies:

composer install
npm install
npm run dev
Salin file .env.example menjadi .env:

cp .env.example .env
Generate key aplikasi:

php artisan key:generate
Konfigurasi database di .env lalu jalankan migrasi dan seeder:

php artisan migrate --seed
Jalankan server Laravel:

php artisan serve
Akses aplikasi melalui http://localhost:8000.

Screenshot
Dashboard Arsip Surat
![alt text](<Screenshot 2025-10-04 033851.png>)
Arsip Surat
![alt text](<Screenshot 2025-10-04 033922.png>)
Kategori Surat
![alt text](<Screenshot 2025-10-04 033938.png>)
About
![alt text](<Screenshot 2025-10-04 033954.png>)