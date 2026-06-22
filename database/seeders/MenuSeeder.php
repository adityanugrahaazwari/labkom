<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get permissions to associate with admin menus
        $manageUsers = Permission::where('name', 'manage-users')->first();
        $manageRoles = Permission::where('name', 'manage-roles')->first();
        $manageMenus = Permission::where('name', 'manage-menus')->first();
        $manageSettings = Permission::where('name', 'manage-settings')->first();
        $managePages = Permission::where('name', 'manage-pages')->first();
        $manageBerita = Permission::where('name', 'manage-berita')->first();
        $managePengumuman = Permission::where('name', 'manage-pengumuman')->first();
        $manageAgenda = Permission::where('name', 'manage-agenda')->first();
        $manageFaq = Permission::where('name', 'manage-faq')->first();
        $manageMedia = Permission::where('name', 'manage-media')->first();
        $manageDocuments = Permission::where('name', 'manage-documents')->first();
        $manageProfiles = Permission::where('name', 'manage-profiles')->first();
        $manageFacilities = Permission::where('name', 'manage-facilities')->first();

        // ============================================
        // 1. SEED PUBLIC MENUS (position = 'header')
        // ============================================

        // Beranda
        Menu::create([
            'name' => 'Beranda',
            'url' => '/',
            'route_name' => 'home',
            'order' => 1,
            'position' => 'header',
        ]);

        // Profil Laboratorium (Parent)
        $profil = Menu::create([
            'name' => 'Profil',
            'url' => '#',
            'order' => 2,
            'position' => 'header',
        ]);

        // Profil Children
        Menu::create([
            'parent_id' => $profil->id,
            'name' => 'Visi & Misi',
            'url' => '/profil/vision-mission',
            'route_name' => 'profil.vision-mission',
            'order' => 1,
            'position' => 'header',
        ]);

        Menu::create([
            'parent_id' => $profil->id,
            'name' => 'Struktur Organisasi',
            'url' => '/profil/organizational-structure',
            'route_name' => 'profil.organizational-structure',
            'order' => 2,
            'position' => 'header',
        ]);

        Menu::create([
            'parent_id' => $profil->id,
            'name' => 'SDM & Anggota',
            'url' => '/profil/sdm',
            'order' => 3,
            'position' => 'header',
        ]);

        // Fasilitas
        Menu::create([
            'name' => 'Fasilitas',
            'url' => '/fasilitas/laboratorium',
            'route_name' => 'fasilitas.laboratorium',
            'order' => 3,
            'position' => 'header',
        ]);

        // Publikasi (Parent)
        $publikasi = Menu::create([
            'name' => 'Publikasi',
            'url' => '#',
            'order' => 4,
            'position' => 'header',
        ]);

        Menu::create([
            'parent_id' => $publikasi->id,
            'name' => 'Berita',
            'url' => '/berita',
            'route_name' => 'berita.index',
            'order' => 1,
            'position' => 'header',
        ]);

        Menu::create([
            'parent_id' => $publikasi->id,
            'name' => 'Pengumuman',
            'url' => '/pengumuman',
            'order' => 2,
            'position' => 'header',
        ]);

        Menu::create([
            'parent_id' => $publikasi->id,
            'name' => 'Agenda Kegiatan',
            'url' => '/agenda',
            'route_name' => 'agenda.index',
            'order' => 3,
            'position' => 'header',
        ]);

        // Galeri
        Menu::create([
            'name' => 'Galeri',
            'url' => '/galeri',
            'order' => 5,
            'position' => 'header',
        ]);

        // Unduhan
        Menu::create([
            'name' => 'Unduhan',
            'url' => '/unduhan',
            'route_name' => 'unduhan.index',
            'order' => 6,
            'position' => 'header',
        ]);

        // FAQ
        Menu::create([
            'name' => 'FAQ',
            'url' => '/faq',
            'route_name' => 'faq',
            'order' => 7,
            'position' => 'header',
        ]);

        // ============================================
        // ============================================
        // 2. SEED ADMIN SIDEBAR MENUS (position = 'sidebar')
        // ============================================

        // Dashboard
        Menu::create([
            'name' => 'Dashboard',
            'url' => '/admin/dashboard',
            'route_name' => 'admin.dashboard',
            'icon' => 'dashboard',
            'order' => 1,
            'position' => 'sidebar',
        ]);

        // 1. Manajemen Konten Group
        $contentGroup = Menu::create([
            'name' => 'Manajemen Konten',
            'url' => '#',
            'icon' => 'document-text',
            'order' => 2,
            'position' => 'sidebar',
        ]);

        Menu::create([
            'parent_id' => $contentGroup->id,
            'name' => 'Halaman Statis',
            'url' => '/admin/pages',
            'order' => 1,
            'position' => 'sidebar',
            'permission_id' => $managePages?->id,
        ]);

        Menu::create([
            'parent_id' => $contentGroup->id,
            'name' => 'Kategori Berita',
            'url' => '/admin/berita-kategori',
            'route_name' => 'admin.berita-kategori.index',
            'order' => 2,
            'position' => 'sidebar',
            'permission_id' => $manageBerita?->id,
        ]);

        Menu::create([
            'parent_id' => $contentGroup->id,
            'name' => 'Berita',
            'url' => '/admin/berita',
            'route_name' => 'admin.berita.index',
            'order' => 3,
            'position' => 'sidebar',
            'permission_id' => $manageBerita?->id,
        ]);

        Menu::create([
            'parent_id' => $contentGroup->id,
            'name' => 'Pengumuman',
            'url' => '/admin/pengumuman',
            'order' => 4,
            'position' => 'sidebar',
            'permission_id' => $managePengumuman?->id,
        ]);

        Menu::create([
            'parent_id' => $contentGroup->id,
            'name' => 'Agenda',
            'url' => '/admin/agenda',
            'route_name' => 'admin.agenda.index',
            'order' => 5,
            'position' => 'sidebar',
            'permission_id' => $manageAgenda?->id,
        ]);

        Menu::create([
            'parent_id' => $contentGroup->id,
            'name' => 'FAQ',
            'url' => '/admin/faq',
            'route_name' => 'admin.faq.index',
            'order' => 6,
            'position' => 'sidebar',
            'permission_id' => $manageFaq?->id,
        ]);

        // 2. Profil & Fasilitas Group
        $profileGroup = Menu::create([
            'name' => 'Profil & Fasilitas',
            'url' => '#',
            'icon' => 'user-group',
            'order' => 3,
            'position' => 'sidebar',
        ]);

        Menu::create([
            'parent_id' => $profileGroup->id,
            'name' => 'Visi & Misi',
            'url' => '/admin/vision-mission',
            'route_name' => 'admin.vision-mission.edit',
            'order' => 1,
            'position' => 'sidebar',
            'permission_id' => $manageProfiles?->id,
        ]);

        Menu::create([
            'parent_id' => $profileGroup->id,
            'name' => 'Struktur Organisasi',
            'url' => '/admin/organizational-structure',
            'route_name' => 'admin.organizational-structure.index',
            'order' => 2,
            'position' => 'sidebar',
            'permission_id' => $manageProfiles?->id,
        ]);

        Menu::create([
            'parent_id' => $profileGroup->id,
            'name' => 'Fasilitas Lab',
            'url' => '/admin/facilities',
            'route_name' => 'admin.facilities.index',
            'order' => 3,
            'position' => 'sidebar',
            'permission_id' => $manageFacilities?->id,
        ]);

        // 3. Media & Berkas Group
        $mediaGroup = Menu::create([
            'name' => 'Media & Berkas',
            'url' => '#',
            'icon' => 'folder-open',
            'order' => 4,
            'position' => 'sidebar',
        ]);

        Menu::create([
            'parent_id' => $mediaGroup->id,
            'name' => 'Galeri & Media',
            'url' => '/admin/media',
            'order' => 1,
            'position' => 'sidebar',
            'permission_id' => $manageMedia?->id,
        ]);

        Menu::create([
            'parent_id' => $mediaGroup->id,
            'name' => 'Manajemen Dokumen',
            'url' => '/admin/documents',
            'route_name' => 'admin.documents.index',
            'order' => 2,
            'position' => 'sidebar',
            'permission_id' => $manageDocuments?->id,
        ]);

        // 4. Akses & Pengguna Group
        $usersGroup = Menu::create([
            'name' => 'Akses & Pengguna',
            'url' => '#',
            'icon' => 'users',
            'order' => 5,
            'position' => 'sidebar',
        ]);

        Menu::create([
            'parent_id' => $usersGroup->id,
            'name' => 'Data Pengguna',
            'url' => '/admin/users',
            'order' => 1,
            'position' => 'sidebar',
            'permission_id' => $manageUsers?->id,
        ]);

        Menu::create([
            'parent_id' => $usersGroup->id,
            'name' => 'Peran (Role)',
            'url' => '/admin/roles',
            'order' => 2,
            'position' => 'sidebar',
            'permission_id' => $manageRoles?->id,
        ]);

        Menu::create([
            'parent_id' => $usersGroup->id,
            'name' => 'Hak Akses (Permission)',
            'url' => '/admin/permissions',
            'order' => 3,
            'position' => 'sidebar',
            'permission_id' => $manageRoles?->id,
        ]);

        // 5. Pengaturan Sistem Group
        $systemGroup = Menu::create([
            'name' => 'Pengaturan',
            'url' => '#',
            'icon' => 'cog',
            'order' => 6,
            'position' => 'sidebar',
        ]);

        Menu::create([
            'parent_id' => $systemGroup->id,
            'name' => 'Menu Navigasi',
            'url' => '/admin/menus',
            'order' => 1,
            'position' => 'sidebar',
            'permission_id' => $manageMenus?->id,
        ]);

        Menu::create([
            'parent_id' => $systemGroup->id,
            'name' => 'Identitas Web',
            'url' => '/admin/settings',
            'order' => 2,
            'position' => 'sidebar',
            'permission_id' => $manageSettings?->id,
        ]);
    }
}
