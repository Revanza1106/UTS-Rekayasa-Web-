<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $today = Carbon::today();

        $events = [
            ['Pagi Berlari, Pagi Berarti', 'Langkah Pagi Jakarta', 'Taman Suropati, Jakarta Pusat', 3, '06:00:00', 35000, 'Mulai akhir pekan dengan lari santai 5K bersama komunitas. Ada pemanasan bareng, rute ramah pemula, air minum, dan obrolan ringan setelah garis finis. Datang sendiri juga boleh—teman lari baru selalu disambut.', 'pagi-berlari.svg'],
            ['Ruang Rupa: Zine & Print Fair', 'Kolektif Kertas', 'M Bloc Space, Jakarta Selatan', 6, '10:00:00', 25000, 'Sehari penuh untuk merayakan karya cetak independen. Temukan zine, ilustrasi, poster, dan merchandise dari kreator lokal; ikut lokakarya cetak sederhana; lalu kenalan dengan orang-orang yang sama-sama suka membuat sesuatu dengan tangan.', 'ruang-rupa.svg'],
            ['Dengar Kota: Sesi Akustik Senja', 'Suara Sore', 'Taman Ismail Marzuki, Jakarta Pusat', 9, '16:30:00', 50000, 'Sesi musik akustik intim bersama musisi independen Jakarta. Nikmati lagu-lagu pilihan, cerita di balik karya, dan suasana senja yang santai. Tiket sudah termasuk minuman dari tenant komunitas.', 'dengar-kota.svg'],
            ['Kebun Kecil, Dampak Besar', 'Bumi Bertumbuh', 'Kebun Komunitas Cikini, Jakarta Pusat', 13, '08:00:00', 20000, 'Belajar menanam sayur di ruang terbatas lewat praktik langsung. Peserta akan membawa pulang bibit, media tanam, dan panduan sederhana untuk memulai kebun kecil di rumah. Cocok untuk pemula dan keluarga.', 'kebun-kecil.svg'],
            ['Ngobrol Baik: Kota untuk Semua', 'Teman Trotoar', 'Kopi Tuku, Cipete, Jakarta Selatan', 17, '19:00:00', 0, 'Diskusi terbuka soal ruang publik yang nyaman dan mudah diakses semua orang. Kita akan mendengar pengalaman warga, berbagi gagasan praktis, dan menyusun satu langkah kecil yang bisa dilakukan bersama di lingkungan masing-masing.', 'ngobrol-baik.svg'],
            ['Kelas Foto: Cahaya Sehari-hari', 'Jepret Bareng', 'Kota Tua, Jakarta Barat', 21, '15:30:00', 45000, 'Jalan foto santai untuk belajar membaca cahaya alami dan bercerita lewat satu bingkai. Bawa kamera atau ponsel, dapatkan masukan langsung dari mentor, dan tutup hari dengan sesi berbagi hasil foto.', 'kelas-foto.svg'],
            ['Tukar Buku, Tukar Cerita', 'Baca Bergilir', 'Taman Literasi Martha Tiahahu, Jakarta Selatan', 25, '13:00:00', 15000, 'Bawa satu buku yang ingin kamu bagikan dan pulang dengan bacaan baru. Ada sesi rekomendasi buku kilat, pojok baca tenang, dan permainan kecil untuk menemukan teman baca dengan selera serupa.', 'tukar-buku.svg'],
            ['Malam Papan: Board Game Meetup', 'Main Dulu Jakarta', 'M Bloc Space, Jakarta Selatan', 29, '18:30:00', 30000, 'Kenalan lewat permainan papan yang seru, dari permainan singkat sampai strategi tim. Fasilitator akan membantu memilih permainan sesuai jumlah pemain dan menjelaskan aturan untuk yang baru pertama kali ikut.', 'malam-papan.svg'],
        ];

        foreach ($events as [$name, $organizer, $location, $days, $time, $price, $description, $banner]) {
            Event::updateOrCreate(
                ['name' => $name],
                [
                    'organizer' => $organizer,
                    'location' => $location,
                    'date' => $today->copy()->addDays($days)->toDateString(),
                    'time' => $time,
                    'ticket_price' => $price,
                    'description' => $description,
                    'banner' => $banner,
                ],
            );
        }
    }
}
