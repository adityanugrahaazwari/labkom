<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Hero Section
            'hero_title' => 'Pusat Riset dan Pembelajaran Teknologi Informasi',
            'hero_subtitle' => 'Laboratorium Komputer menyelenggarakan kegiatan akademik praktikum, pelatihan teknologi, riset ilmiah, serta sertifikasi kompetensi global.',
            'hero_image' => '',
            'hero_primary_btn_text' => 'Jelajahi Fasilitas',
            'hero_primary_btn_url' => '/fasilitas/laboratorium',
            'hero_secondary_btn_text' => 'Lihat Unduhan',
            'hero_secondary_btn_url' => '/unduhan',

            // Greetings Section
            'greetings_title' => 'Sambutan Kepala Laboratorium',
            'greetings_name' => 'Dr. Aditya Nugraha, M.T.',
            'greetings_role' => 'Kepala Laboratorium Komputer',
            'greetings_content' => 'Selamat datang di portal resmi Laboratorium Komputer. Laboratorium Komputer berkomitmen tinggi untuk terus memfasilitasi kebutuhan praktikum, pelatihan riset, serta pengembangan keterampilan digital mahasiswa dan civitas akademika agar mampu berdaya saing di industri global.',
            'greetings_avatar' => '',

            // Footer Section & Contact
            'footer_about' => 'CMS Laboratorium Komputer merupakan pusat layanan informasi akademik praktikum, kegiatan pelatihan teknologi, riset ilmiah, sertifikasi, serta dokumentasi kegiatan.',
            'footer_address' => 'Jl. Raya Kampus No. 1, Kota Komputer, 12345',
            'footer_email' => 'labkom@institusi.ac.id',
            'footer_phone' => '+62 123 4567 890',
            'footer_copyright' => '© 2026 Laboratorium Komputer. All rights reserved.',

            // Social Media
            'social_instagram' => 'https://instagram.com',
            'social_facebook' => 'https://facebook.com',
            'social_youtube' => 'https://youtube.com',
            'social_linkedin' => 'https://linkedin.com',
            'social_tiktok' => '',
            'social_twitter' => '',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }
    }
}
