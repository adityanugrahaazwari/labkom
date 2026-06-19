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
            'url' => '/profil/visi-misi',
            'route_name' => 'profil.visi-misi',
            'order' => 1,
            'position' => 'header',
        ]);

        Menu::create([
            'parent_id' => $profil->id,
            'name' => 'Struktur Organisasi',
            'url' => '/profil/struktur-organisasi',
            'route_name' => 'profil.struktur-organisasi',
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
            'order' => 7,
            'position' => 'header',
        ]);

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

        // Manajemen Halaman
        Menu::create([
            'name' => 'Manajemen Halaman',
            'url' => '/admin/pages',
            'icon' => 'document-text',
            'order' => 2,
            'position' => 'sidebar',
            'permission_id' => $managePages?->id,
        ]);

        // Manajemen Berita & Pengumuman (Parent)
        $adminPublikasi = Menu::create([
            'name' => 'Publikasi',
            'url' => '#',
            'icon' => 'newspaper',
            'order' => 3,
            'position' => 'sidebar',
            'permission_id' => $manageBerita?->id,
        ]);

        Menu::create([
            'parent_id' => $adminPublikasi->id,
            'name' => 'Berita',
            'url' => '/admin/berita',
            'order' => 1,
            'position' => 'sidebar',
            'permission_id' => $manageBerita?->id,
        ]);

        Menu::create([
            'parent_id' => $adminPublikasi->id,
            'name' => 'Pengumuman',
            'url' => '/admin/pengumuman',
            'order' => 2,
            'position' => 'sidebar',
            'permission_id' => $managePengumuman?->id,
        ]);

        Menu::create([
            'parent_id' => $adminPublikasi->id,
            'name' => 'Agenda',
            'url' => '/admin/agenda',
            'order' => 3,
            'position' => 'sidebar',
            'permission_id' => $manageAgenda?->id,
        ]);

        // Manajemen Galeri
        Menu::create([
            'name' => 'Galeri & Media',
            'url' => '/admin/media',
            'icon' => 'photograph',
            'order' => 4,
            'position' => 'sidebar',
            'permission_id' => $manageMedia?->id,
        ]);

        // Manajemen Profil & SDM
        Menu::create([
            'name' => 'Profil & SDM',
            'url' => '/admin/profil',
            'icon' => 'user-group',
            'order' => 5,
            'position' => 'sidebar',
            'permission_id' => $manageProfiles?->id,
        ]);

        // Manajemen Fasilitas
        Menu::create([
            'name' => 'Fasilitas Lab',
            'url' => '/admin/facilities',
            'icon' => 'office-building',
            'order' => 6,
            'position' => 'sidebar',
            'permission_id' => $manageFacilities?->id,
        ]);

        // Manajemen Dokumen
        Menu::create([
            'name' => 'Manajemen Dokumen',
            'url' => '/admin/documents',
            'icon' => 'folder-open',
            'order' => 7,
            'position' => 'sidebar',
            'permission_id' => $manageDocuments?->id,
        ]);

        // Manajemen FAQ
        Menu::create([
            'name' => 'Manajemen FAQ',
            'url' => '/admin/faq',
            'icon' => 'question-mark-circle',
            'order' => 8,
            'position' => 'sidebar',
            'permission_id' => $manageFaq?->id,
        ]);

        // User & Role Management (Parent)
        $adminUsers = Menu::create([
            'name' => 'Akses & Pengguna',
            'url' => '#',
            'icon' => 'users',
            'order' => 9,
            'position' => 'sidebar',
            'permission_id' => $manageUsers?->id,
        ]);

        Menu::create([
            'parent_id' => $adminUsers->id,
            'name' => 'Data Pengguna',
            'url' => '/admin/users',
            'order' => 1,
            'position' => 'sidebar',
            'permission_id' => $manageUsers?->id,
        ]);

        Menu::create([
            'parent_id' => $adminUsers->id,
            'name' => 'Peran (Role)',
            'url' => '/admin/roles',
            'order' => 2,
            'position' => 'sidebar',
            'permission_id' => $manageRoles?->id,
        ]);

        Menu::create([
            'parent_id' => $adminUsers->id,
            'name' => 'Hak Akses (Permission)',
            'url' => '/admin/permissions',
            'order' => 3,
            'position' => 'sidebar',
            'permission_id' => $manageRoles?->id,
        ]);

        // Pengaturan Sistem (Parent)
        $adminSystem = Menu::create([
            'name' => 'Pengaturan',
            'url' => '#',
            'icon' => 'cog',
            'order' => 10,
            'position' => 'sidebar',
            'permission_id' => $manageSettings?->id,
        ]);

        Menu::create([
            'parent_id' => $adminSystem->id,
            'name' => 'Menu Navigasi',
            'url' => '/admin/menus',
            'order' => 1,
            'position' => 'sidebar',
            'permission_id' => $manageMenus?->id,
        ]);

        Menu::create([
            'parent_id' => $adminSystem->id,
            'name' => 'Identitas Web',
            'url' => '/admin/settings',
            'order' => 2,
            'position' => 'sidebar',
            'permission_id' => $manageSettings?->id,
        ]);
    }
}
