# RuangTemu — acara komunitas lokal

Aplikasi frontend Laravel 13 untuk menemukan acara komunitas di Jakarta dan sekitarnya. Halaman daftar dan detail memakai Blade, Bootstrap lokal, serta banner SVG buatan sendiri.

## Jalankan aplikasi

Prasyarat: Docker Desktop dan Docker Compose sudah terpasang.

```sh
./start.sh
```

Skrip akan membangun image PHP 8.4, menyalakan MySQL, menjalankan migration dan seeder, memilih port host yang kosong secara otomatis, lalu menampilkan URL aplikasi. Buka URL `http://127.0.0.1:<port>` yang tercetak.

Untuk menghentikan aplikasi:

```sh
./stop.sh
```

Data tetap tersimpan di volume `mysql_data` setelah aplikasi dihentikan. Untuk memulai ulang tanpa rebuild, jalankan `docker compose up -d`; port baru mungkin dipilih. Perintah `docker compose down -v` menghapus data database.

## Isi aplikasi

- Daftar acara dengan pencarian nama acara, penyelenggara, dan lokasi, serta pagination.
- Halaman detail acara berisi penyelenggara, lokasi, tanggal, waktu, harga tiket, dan deskripsi.
- Migration membuat tabel `events`; seeder mengisi delapan acara dengan tanggal yang selalu mendatang.
- Banner lokal tersimpan di `public/assets/images/`.
- Bootstrap 4.6 lokal tersimpan di `public/Bootstrap/`; gaya tema ada di `public/assets/css/app.css`.
- Nama database Docker: `db_uts_nim`.

## Struktur data acara

`id`, `name`, `organizer`, `location`, `date`, `time`, `ticket_price`, `description`, `banner`, `created_at`, `updated_at`.

Data contoh dapat diisi ulang dengan:

```sh
docker compose exec app php artisan db:seed --class=EventSeeder --force
```

## Identitas dan pengumpulan

Sebelum dikumpulkan, ganti kolom identitas dan URL GitHub di `docs/Dokumentasi_RuangTemu.docx`. Nama repositori tugas yang diminta: `UTS_NAMA_NIM_KODEKELAS`. Simpan screenshot aplikasi pada dokumen tersebut setelah membuka aplikasi dari URL yang ditampilkan oleh `./start.sh`.
