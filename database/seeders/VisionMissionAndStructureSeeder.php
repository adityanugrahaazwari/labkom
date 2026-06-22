<?php

namespace Database\Seeders;

use App\Models\VisionMission;
use App\Models\OrganizationalStructure;
use Illuminate\Database\Seeder;

class VisionMissionAndStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Seed Vision & Mission (Single Data)
        VisionMission::create([
            'vision' => 'Menjadi pusat informasi digital Laboratorium Komputer yang modern, informatif, profesional, dan mudah diakses untuk mendukung kegiatan akademik, publikasi, dokumentasi, serta pelayanan informasi laboratorium.',
            'missions' => [
                'Menyediakan informasi laboratorium secara terpusat.',
                'Mendukung penyebaran informasi yang cepat dan akurat.',
                'Menyediakan sarana publikasi kegiatan laboratorium.',
                'Mendukung dokumentasi kegiatan secara berkelanjutan.',
                'Meningkatkan kualitas pelayanan informasi kepada civitas akademika dan masyarakat.'
            ]
        ]);

        // 2. Seed Struktur Organisasi (Tree Concept)
        // Level 1: Kepala Laboratorium
        $kepala = OrganizationalStructure::create([
            'parent_id' => null,
            'name' => 'Dr. Ir. H. Nama Kepala, M.T.',
            'position' => 'Kepala Laboratorium',
            'nip' => '19800101 200501 1 001',
            'specialty' => 'Manajemen Laboratorium',
            'order' => 1,
        ]);

        // Level 2: Pranata Komputer Ahli Pertama
        $pranataAhli1 = OrganizationalStructure::create([
            'parent_id' => $kepala->id,
            'name' => 'Nama Pranata Ahli 1',
            'position' => 'Pranata Komputer Ahli Pertama',
            'nip' => '19850101 201001 1 001',
            'specialty' => 'Sistem Informasi & Basis Data',
            'order' => 1,
        ]);

        $pranataAhli2 = OrganizationalStructure::create([
            'parent_id' => $kepala->id,
            'name' => 'Nama Pranata Ahli 2',
            'position' => 'Pranata Komputer Ahli Pertama',
            'nip' => '19850101 201001 1 002',
            'specialty' => 'Infrastruktur Jaringan & Server',
            'order' => 2,
        ]);

        // Level 3: Pranata Komputer Terampil (reporting to Pranata Ahli 1)
        $pranataTerampil1 = OrganizationalStructure::create([
            'parent_id' => $pranataAhli1->id,
            'name' => 'Nama Pranata Terampil 1',
            'position' => 'Pranata Komputer Terampil',
            'nip' => '19900101 201501 1 001',
            'specialty' => 'Administrasi Sistem',
            'order' => 1,
        ]);

        $pranataTerampil2 = OrganizationalStructure::create([
            'parent_id' => $pranataAhli1->id,
            'name' => 'Nama Pranata Terampil 2',
            'position' => 'Pranata Komputer Terampil',
            'nip' => '19900101 201501 1 002',
            'specialty' => 'Keamanan Jaringan',
            'order' => 2,
        ]);

        // Level 3: Pranata Komputer Terampil (reporting to Pranata Ahli 2)
        $pranataTerampil3 = OrganizationalStructure::create([
            'parent_id' => $pranataAhli2->id,
            'name' => 'Nama Pranata Terampil 3',
            'position' => 'Pranata Komputer Terampil',
            'nip' => '19900101 201501 1 003',
            'specialty' => 'Pengembangan Aplikasi',
            'order' => 1,
        ]);

        $pranataTerampil4 = OrganizationalStructure::create([
            'parent_id' => $pranataAhli2->id,
            'name' => 'Nama Pranata Terampil 4',
            'position' => 'Pranata Komputer Terampil',
            'nip' => '19900101 201501 1 004',
            'specialty' => 'Desain & Multimedia',
            'order' => 2,
        ]);

        // Level 4: Teknisi Laboran (reporting to Terampil nodes)
        OrganizationalStructure::create([
            'parent_id' => $pranataTerampil1->id,
            'name' => 'Nama Teknisi 1',
            'position' => 'Teknisi Laboran',
            'nip' => null,
            'specialty' => 'Spesialis Lab Jaringan',
            'order' => 1,
        ]);

        OrganizationalStructure::create([
            'parent_id' => $pranataTerampil3->id,
            'name' => 'Nama Teknisi 2',
            'position' => 'Teknisi Laboran',
            'nip' => null,
            'specialty' => 'Spesialis Lab Multimedia',
            'order' => 1,
        ]);

        OrganizationalStructure::create([
            'parent_id' => $pranataTerampil4->id,
            'name' => 'Nama Teknisi 3',
            'position' => 'Teknisi Laboran',
            'nip' => null,
            'specialty' => 'Spesialis Lab Hardware',
            'order' => 1,
        ]);
    }
}
