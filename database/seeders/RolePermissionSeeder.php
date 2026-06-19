<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Define Permissions
        $permissions = [
            // System Management
            ['name' => 'manage-users', 'display_name' => 'Mengelola Pengguna', 'group_name' => 'System Management'],
            ['name' => 'manage-roles', 'display_name' => 'Mengelola Peran', 'group_name' => 'System Management'],
            ['name' => 'manage-permissions', 'display_name' => 'Mengelola Hak Akses', 'group_name' => 'System Management'],
            ['name' => 'manage-settings', 'display_name' => 'Mengelola Pengaturan Web', 'group_name' => 'System Management'],
            ['name' => 'manage-menus', 'display_name' => 'Mengelola Menu Navigasi', 'group_name' => 'System Management'],

            // Content Management
            ['name' => 'manage-pages', 'display_name' => 'Mengelola Halaman Statis', 'group_name' => 'Content Management'],
            ['name' => 'manage-berita', 'display_name' => 'Mengelola Berita', 'group_name' => 'Content Management'],
            ['name' => 'manage-pengumuman', 'display_name' => 'Mengelola Pengumuman', 'group_name' => 'Content Management'],
            ['name' => 'manage-agenda', 'display_name' => 'Mengelola Agenda', 'group_name' => 'Content Management'],
            ['name' => 'manage-faq', 'display_name' => 'Mengelola FAQ', 'group_name' => 'Content Management'],

            // Media & Documents
            ['name' => 'manage-media', 'display_name' => 'Mengelola Media Library', 'group_name' => 'Media & Documents'],
            ['name' => 'manage-documents', 'display_name' => 'Mengelola Dokumen & Unduhan', 'group_name' => 'Media & Documents'],

            // Profiles & Facilities
            ['name' => 'manage-profiles', 'display_name' => 'Mengelola Profil & SDM', 'group_name' => 'Profiles & Facilities'],
            ['name' => 'manage-facilities', 'display_name' => 'Mengelola Fasilitas Lab', 'group_name' => 'Profiles & Facilities'],
        ];

        $permissionModels = [];
        foreach ($permissions as $perm) {
            $permissionModels[$perm['name']] = Permission::create($perm);
        }

        // 2. Define Roles
        $roles = [
            'super-admin' => [
                'display_name' => 'Super Administrator',
                'description' => 'Memiliki hak akses penuh ke seluruh sistem.',
                'permissions' => array_keys($permissionModels) // all permissions
            ],
            'admin' => [
                'display_name' => 'Administrator',
                'description' => 'Mengelola konten, halaman, berita, pengumuman, agenda, dan galeri.',
                'permissions' => [
                    'manage-pages', 'manage-berita', 'manage-pengumuman', 'manage-agenda', 
                    'manage-faq', 'manage-media', 'manage-documents'
                ]
            ],
            'kepala-lab' => [
                'display_name' => 'Kepala Laboratorium',
                'description' => 'Melakukan pengawasan konten dan memantau aktivitas sistem.',
                'permissions' => [
                    'manage-pages', 'manage-berita', 'manage-pengumuman', 'manage-agenda', 'manage-documents'
                ]
            ],
            'laboran' => [
                'display_name' => 'Laboran',
                'description' => 'Membantu mengelola media, dokumen unduhan, dan fasilitas laboratorium.',
                'permissions' => [
                    'manage-media', 'manage-documents', 'manage-facilities'
                ]
            ]
        ];

        $roleModels = [];
        foreach ($roles as $name => $data) {
            $role = Role::create([
                'name' => $name,
                'display_name' => $data['display_name'],
                'description' => $data['description']
            ]);
            
            $roleModels[$name] = $role;

            // Attach permissions
            $permsToSync = array_map(fn($pName) => $permissionModels[$pName]->id, $data['permissions']);
            $role->permissions()->sync($permsToSync);
        }

        // 3. Attach Roles to Users
        // First check existing default user
        $superAdminUser = User::where('email', 'admin@labkom.com')->first();
        if ($superAdminUser) {
            $superAdminUser->roles()->sync([$roleModels['super-admin']->id]);
        } else {
            $superAdminUser = User::create([
                'name' => 'Aditya Admin',
                'email' => 'admin@labkom.com',
                'password' => Hash::make('password123'),
            ]);
            $superAdminUser->roles()->sync([$roleModels['super-admin']->id]);
        }

        // Create other test users
        $adminUser = User::create([
            'name' => 'Content Admin',
            'email' => 'admin.content@labkom.com',
            'password' => Hash::make('password123'),
        ]);
        $adminUser->roles()->sync([$roleModels['admin']->id]);

        $kepalaLabUser = User::create([
            'name' => 'Kepala Lab',
            'email' => 'kepala.lab@labkom.com',
            'password' => Hash::make('password123'),
        ]);
        $kepalaLabUser->roles()->sync([$roleModels['kepala-lab']->id]);

        $laboranUser = User::create([
            'name' => 'Laboran Lab',
            'email' => 'laboran@labkom.com',
            'password' => Hash::make('password123'),
        ]);
        $laboranUser->roles()->sync([$roleModels['laboran']->id]);
    }
}
