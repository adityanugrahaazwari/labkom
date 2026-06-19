<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use App\Models\News;
use App\Models\Document;
use App\Models\Laboratory;
use App\Models\Faq;
use App\Models\Agenda;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Seed News Categories
        $kegiatan = NewsCategory::create(['name' => 'Kegiatan', 'slug' => 'kegiatan']);
        $pengumuman = NewsCategory::create(['name' => 'Pengumuman', 'slug' => 'pengumuman']);
        $prestasi = NewsCategory::create(['name' => 'Prestasi', 'slug' => 'prestasi']);

        // 2. Seed News Articles (Authorship to User 1)
        News::create([
            'news_category_id' => $kegiatan->id,
            'user_id' => 1,
            'title' => 'Workshop Pemrograman Modern dengan Laravel & Tailwind CSS',
            'slug' => 'workshop-pemrograman-modern-dengan-laravel-tailwind-css',
            'content' => "Laboratorium Komputer menyelenggarakan workshop intensif untuk meningkatkan kompetensi mahasiswa dalam pengembangan web modern menggunakan teknologi terbaru. Kegiatan ini dirancang untuk membekali civitas akademika dengan teknik-teknik pembuatan antarmuka responsif dan clean code.\n\nMateri yang diajarkan meliputi:\n- Fundamental arsitektur MVC di Laravel\n- Kustomisasi utility-first classes di Tailwind CSS\n- Integrasi frontend reaktif dengan Alpine.js\n- Deployment server lokal ke hosting produksi\n\nSeluruh mahasiswa diharapkan mengikuti agenda tahunan ini secara penuh.",
            'image' => null,
            'is_published' => true,
            'views' => 124,
            'published_at' => now(),
        ]);

        News::create([
            'news_category_id' => $pengumuman->id,
            'user_id' => 1,
            'title' => 'Jadwal Ujian Praktikum Semester Genap Tahun Ajaran 2025/2026',
            'slug' => 'jadwal-ujian-praktikum-semester-genap-tahun-ajaran-2025-2026',
            'content' => "Diberitahukan kepada seluruh mahasiswa aktif bahwa pendaftaran ujian praktikum komputer semester genap telah resmi dibuka. Ujian akan dilaksanakan mulai tanggal 25 Juni hingga 2 Juli 2026.\n\nHarap diperhatikan syarat-syarat berikut:\n1. Membawa Kartu Kendali Praktikum yang telah ditandatangani asisten lab.\n2. Berpakaian rapi, sopan, dan memakai almamater.\n3. Datang 15 menit sebelum sesi ujian dimulai.\n\nKeterlambatan lebih dari 10 menit akan dikenakan sanksi pembatalan sesi.",
            'image' => null,
            'is_published' => true,
            'views' => 312,
            'published_at' => now()->subDays(2),
        ]);

        News::create([
            'news_category_id' => $prestasi->id,
            'user_id' => 1,
            'title' => 'Tim Robotika Labkom Meraih Juara 1 Tingkat Nasional',
            'slug' => 'tim-robotika-labkom-meraih-juara-1-tingkat-nasional',
            'content' => "Kabar membanggakan datang dari Tim Robotika Laboratorium Komputer yang berhasil menyabet gelar Juara 1 pada Kompetisi Rancang Bangun Robotik Nasional 2026.\n\nTim yang dibimbing oleh laboran Eko Prasetyo ini memamerkan robot pemantau suhu ruangan berbasis IoT yang dirancang mandiri di Lab Hardware. Prestasi ini membuktikan dedikasi tinggi civitas akademika dalam menciptakan solusi teknologi terapan yang bermanfaat bagi masyarakat luas.",
            'image' => null,
            'is_published' => true,
            'views' => 89,
            'published_at' => now()->subDays(5),
        ]);

        // 3. Seed Download Documents
        Document::create([
            'title' => 'Formulir Peminjaman Alat Laboratorium',
            'description' => 'Gunakan formulir ini untuk mengajukan peminjaman PC, router, switch, atau sensor.',
            'file_path' => 'documents/formulir_peminjaman_alat.pdf',
            'file_size' => '245 KB',
            'download_count' => 56,
        ]);

        Document::create([
            'title' => 'SOP Penggunaan Fasilitas & Ruangan',
            'description' => 'Standar Operasional Prosedur mengenai tata tertib penggunaan laboratorium komputer.',
            'file_path' => 'documents/sop_penggunaan_laboratorium.pdf',
            'file_size' => '1.2 MB',
            'download_count' => 142,
        ]);

        Document::create([
            'title' => 'Modul Praktikum Struktur Data & Algoritma',
            'description' => 'Modul pembelajaran mandiri mata kuliah Struktur Data bahasa C/C++.',
            'file_path' => 'documents/modul_struktur_data.pdf',
            'file_size' => '4.5 MB',
            'download_count' => 834,
        ]);

        // 4. Seed Laboratories (Facilities)
        Laboratory::create([
            'name' => 'Laboratorium Programming',
            'slug' => 'laboratorium-programming',
            'description' => "Laboratorium Programming merupakan pusat pengembangan perangkat lunak yang dirancang untuk mendukung mahasiswa dalam mempelajari berbagai bahasa pemrograman, algoritma, dan metodologi pengembangan sistem. Laboratorium ini dilengkapi dengan workstation performa tinggi dan lingkungan pengembangan terkini.\n\nFokus utama kami adalah memberikan pengalaman praktis dalam membangun aplikasi berbasis web, mobile, maupun desktop dengan standar industri saat ini.",
            'image' => null,
            'head_of_lab' => 'Rian Hidayat, S.Kom., M.T.',
            'location' => 'Gedung B, Lantai 3, Ruang 301',
            'status' => true,
        ]);

        Laboratory::create([
            'name' => 'Laboratorium Networking',
            'slug' => 'laboratorium-networking',
            'description' => "Laboratorium Networking difokuskan pada pembelajaran dan riset mengenai infrastruktur jaringan komputer, administrasi server, keamanan siber, dan teknologi cloud computing. Dilengkapi dengan perangkat jaringan skala industri untuk simulasi real-world.\n\nMahasiswa dibimbing untuk menguasai topologi jaringan mendalam serta penanganan insiden keamanan siber.",
            'image' => null,
            'head_of_lab' => 'Andi Wijaya, S.T., M.Kom.',
            'location' => 'Gedung B, Lantai 3, Ruang 302',
            'status' => true,
        ]);

        Laboratory::create([
            'name' => 'Laboratorium Multimedia',
            'slug' => 'laboratorium-multimedia',
            'description' => "Laboratorium Multimedia dirancang khusus untuk mendukung kreativitas mahasiswa dalam bidang desain grafis, editing video, animasi 2D/3D, serta pengembangan game. Didukung perangkat grafis berspesifikasi tinggi dan pen tablet.\n\nLaboratorium ini juga berfungsi sebagai studio produksi konten kreatif kampus.",
            'image' => null,
            'head_of_lab' => 'Siti Aminah, S.Sn., M.Ds.',
            'location' => 'Gedung B, Lantai 4, Ruang 401',
            'status' => true,
        ]);

        Laboratory::create([
            'name' => 'Laboratorium AI & Data Science',
            'slug' => 'laboratorium-ai-data-science',
            'description' => "Laboratorium AI & Data Science merupakan wadah riset dan pembelajaran di bidang kecerdasan buatan, machine learning, deep learning, dan big data analytics. Dilengkapi dengan server GPU bertenaga tinggi untuk pemrosesan dataset skala besar.\n\nKami berfokus menghasilkan inovasi cerdas serta pengolahan wawasan data yang berdampak luas.",
            'image' => null,
            'head_of_lab' => 'Budi Santoso, S.Kom., M.Sc.',
            'location' => 'Gedung B, Lantai 4, Ruang 402',
            'status' => true,
        ]);

        Laboratory::create([
            'name' => 'Laboratorium Hardware & IoT',
            'slug' => 'laboratorium-hardware-iot',
            'description' => "Laboratorium Hardware berfokus pada arsitektur komputer, perakitan sistem, perawatan (maintenance), sistem tertanam (embedded systems), internet of things (IoT), serta robotika dasar. Mahasiswa belajar langsung berinteraksi dengan komponen fisik dan mikrokontroler.\n\nMenyediakan ruang eksperimen kreatif untuk rancang bangun perangkat keras modern.",
            'image' => null,
            'head_of_lab' => 'Eko Prasetyo, S.T., M.T.',
            'location' => 'Gedung B, Lantai 2, Ruang 201',
            'status' => true,
        ]);

        // 5. Seed FAQs
        Faq::create([
            'question' => 'Bagaimana cara melakukan peminjaman alat di Laboratorium Komputer?',
            'answer' => "Mahasiswa dapat mengunduh formulir peminjaman alat di menu 'Unduhan', mengisinya, meminta persetujuan asisten lab, dan menyerahkannya ke laboran di Gedung B Lantai 2 paling lambat H-3 sebelum peminjaman.",
            'order' => 1,
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'Kapan jam operasional Laboratorium Komputer?',
            'answer' => 'Laboratorium Komputer buka setiap hari Senin s.d. Jumat mulai pukul 08.00 WIB hingga 16.00 WIB. Laboratorium tutup pada hari Sabtu, Minggu, dan hari libur nasional.',
            'order' => 2,
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'Apakah mahasiswa di luar jurusan Ilmu Komputer boleh menggunakan fasilitas lab?',
            'answer' => 'Boleh, selama bertujuan untuk kegiatan akademis/riset, dan telah mendapatkan izin tertulis dari Kepala Laboratorium Komputer.',
            'order' => 3,
            'is_active' => true,
        ]);

        // 6. Seed Agendas
        Agenda::create([
            'title' => 'Workshop Internet of Things (IoT) Dasar',
            'slug' => 'workshop-internet-of-things-iot-dasar',
            'description' => 'Workshop pengenalan dasar-dasar IoT menggunakan microcontroller ESP32 dan berbagai sensor lingkungan, serta integrasinya dengan broker MQTT dan dashboard visual.',
            'location' => 'Laboratorium Hardware & IoT, Gedung B Lantai 2',
            'event_date' => '2026-06-25',
            'start_time' => '09:00:00',
            'end_time' => '12:00:00',
            'image' => null,
            'status' => true,
        ]);

        Agenda::create([
            'title' => 'Seminar Nasional Artificial Intelligence & Machine Learning',
            'slug' => 'seminar-nasional-artificial-intelligence-machine-learning',
            'description' => 'Seminar nasional yang menghadirkan pakar industri AI untuk membahas masa depan Machine Learning dan implementasi praktisnya di industri saat ini.',
            'location' => 'Aula Utama Kampus Gedung C',
            'event_date' => '2026-07-10',
            'start_time' => '08:30:00',
            'end_time' => '15:00:00',
            'image' => null,
            'status' => true,
        ]);

        Agenda::create([
            'title' => 'Ujian Praktikum Semester Genap',
            'slug' => 'ujian-praktikum-semester-genap',
            'description' => 'Ujian praktikum terjadwal untuk seluruh mata kuliah komputer di lingkungan Fakultas Ilmu Komputer.',
            'location' => 'Seluruh Ruang Laboratorium Komputer',
            'event_date' => '2026-06-28',
            'start_time' => '08:00:00',
            'end_time' => '17:00:00',
            'image' => null,
            'status' => true,
        ]);

        // 7. Seed Audit Logs
        \App\Models\AuditLog::create([
            'user_id' => 1,
            'action' => 'tambah',
            'model_type' => 'App\Models\News',
            'model_id' => 1,
            'description' => "Aditya Admin menambahkan Berita 'Workshop Pemrograman Modern dengan Laravel & Tailwind CSS'",
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/125.0.0.0',
            'created_at' => now()->subMinutes(12),
        ]);

        \App\Models\AuditLog::create([
            'user_id' => 1,
            'action' => 'tambah',
            'model_type' => 'App\Models\Laboratory',
            'model_id' => 1,
            'description' => "Aditya Admin menambahkan Laboratorium 'Laboratorium Programming'",
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/125.0.0.0',
            'created_at' => now()->subHours(2),
        ]);

        \App\Models\AuditLog::create([
            'user_id' => 2,
            'action' => 'ubah',
            'model_type' => 'App\Models\Faq',
            'model_id' => 2,
            'description' => "Content Admin mengubah FAQ 'Kapan jam operasional Laboratorium Komputer?'",
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/125.0.0.0',
            'created_at' => now()->subHours(5),
        ]);
    }
}
