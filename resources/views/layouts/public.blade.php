<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'CMS Laboratorium Komputer')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script> <!-- Placeholder for icons -->
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-900">
    <div x-data="{ mobileMenuOpen: false }">
        <!-- Header / Navigation -->
        <header class="bg-white border-b border-slate-200 sticky top-0 z-50">
            <nav class="container mx-auto px-4 lg:px-8 flex items-center justify-between h-20">
                <!-- Logo -->
                <a href="/" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-xl">L</div>
                    <div class="flex flex-col">
                        <span class="font-bold text-lg leading-tight">LABKOM</span>
                        <span class="text-xs text-slate-500 uppercase tracking-wider">Pusat Informasi Digital</span>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center gap-8">
                    <a href="/" class="text-sm font-medium hover:text-blue-600 transition">Beranda</a>
                    <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="text-sm font-medium hover:text-blue-600 transition flex items-center gap-1">
                            Profil <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" x-cloak class="absolute left-0 mt-2 w-48 bg-white border border-slate-100 shadow-xl rounded-xl py-2 z-50">
                            <a href="#" class="block px-4 py-2 text-sm hover:bg-slate-50 transition">Sejarah</a>
                            <a href="#" class="block px-4 py-2 text-sm hover:bg-slate-50 transition">Visi & Misi</a>
                            <a href="#" class="block px-4 py-2 text-sm hover:bg-slate-50 transition">Struktur Organisasi</a>
                            <a href="#" class="block px-4 py-2 text-sm hover:bg-slate-50 transition">SDM</a>
                        </div>
                    </div>
                    <a href="#" class="text-sm font-medium hover:text-blue-600 transition">Fasilitas</a>
                    <a href="#" class="text-sm font-medium hover:text-blue-600 transition">Berita</a>
                    <a href="#" class="text-sm font-medium hover:text-blue-600 transition">Download Center</a>
                    <a href="#" class="px-5 py-2.5 bg-blue-600 text-white text-sm font-bold rounded-full hover:bg-blue-700 transition shadow-sm">Portal Akademik</a>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-2 text-slate-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </nav>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" x-cloak class="lg:hidden bg-white border-t border-slate-100 p-4 shadow-lg absolute inset-x-0">
                <div class="flex flex-col gap-4">
                    <a href="/" class="font-medium text-slate-700">Beranda</a>
                    <a href="#" class="font-medium text-slate-700">Profil</a>
                    <a href="#" class="font-medium text-slate-700">Fasilitas</a>
                    <a href="#" class="font-medium text-slate-700">Berita</a>
                    <a href="#" class="font-medium text-slate-700">Download Center</a>
                    <a href="#" class="w-full py-3 bg-blue-600 text-white text-center font-bold rounded-xl">Portal Akademik</a>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-slate-900 text-slate-300 py-16 mt-20">
            <div class="container mx-auto px-4 lg:px-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-xl">L</div>
                        <span class="font-bold text-xl text-white">LABKOM</span>
                    </div>
                    <p class="text-sm leading-relaxed mb-6">Pusat informasi dan layanan digital Laboratorium Komputer untuk mendukung kegiatan akademik dan riset teknologi informasi.</p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-6">Tautan Cepat</h4>
                    <ul class="flex flex-col gap-3 text-sm">
                        <li><a href="#" class="hover:text-blue-400 transition">Sejarah Lab</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Struktur Organisasi</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Daftar Fasilitas</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Arsip Pengumuman</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-6">Layanan</h4>
                    <ul class="flex flex-col gap-3 text-sm">
                        <li><a href="#" class="hover:text-blue-400 transition">Peminjaman Lab</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Modul Praktikum</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">E-Certificate</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-6">Hubungi Kami</h4>
                    <ul class="flex flex-col gap-4 text-sm">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Gedung Laboratorium Terpadu, Lt. 3, Kampus Utama.</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>labkom@university.ac.id</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container mx-auto px-4 lg:px-8 border-t border-slate-800 mt-16 pt-8 text-center text-xs">
                <p>&copy; 2026 CMS Laboratorium Komputer. All rights reserved. Powered by Laravel & Tailwind CSS.</p>
            </div>
        </footer>
    </div>
</body>
</html>
