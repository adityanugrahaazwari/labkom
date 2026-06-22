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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-blue-600/20">L</div>
                    <div class="flex flex-col">
                        <span class="font-bold text-lg leading-tight tracking-tight text-slate-900">Laboratorium Komputer</span>
                        <span class="text-[10px] text-slate-500 uppercase tracking-[0.2em] font-bold">Jurusan Komputer dan Bisnis</span>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('home') }}" 
                       class="text-sm font-bold transition {{ request()->routeIs('home') ? 'text-blue-600' : 'text-slate-600 hover:text-blue-600' }}">Beranda</a>
                    
                    <!-- Profil Dropdown -->
                    <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="text-sm font-bold transition flex items-center gap-1 {{ request()->routeIs('profil.*') ? 'text-blue-600' : 'text-slate-600 hover:text-blue-600' }}" :class="open ? 'text-blue-600' : ''">
                            Profil <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="absolute h-4 w-full top-full"></div> <!-- Bridge to prevent closing on gap hover -->
                        <div x-show="open" 
                             x-cloak 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-1"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 translate-y-1"
                             class="absolute left-0 mt-4 w-56 bg-white border border-slate-100 shadow-xl rounded-xl py-2 z-50">
                            <a href="{{ route('profil.vision-mission') }}" 
                               class="block px-4 py-2 text-sm transition {{ request()->routeIs('profil.vision-mission') ? 'bg-blue-50 text-blue-600 font-bold' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-600' }}">Visi & Misi</a>   
                            <a href="{{ route('profil.organizational-structure') }}" 
                               class="block px-4 py-2 text-sm transition {{ request()->routeIs('profil.organizational-structure') ? 'bg-blue-50 text-blue-600 font-bold' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-600' }}">Struktur Organisasi</a>
                        </div>
                    </div>

                    <!-- Fasilitas Dropdown -->
                    <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="text-sm font-bold transition flex items-center gap-1 {{ request()->routeIs('fasilitas.*') ? 'text-blue-600' : 'text-slate-600 hover:text-blue-600' }}" :class="open ? 'text-blue-600' : ''">
                            Fasilitas <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="absolute h-4 w-full top-full"></div> <!-- Bridge to prevent closing on gap hover -->
                        <div x-show="open" 
                             x-cloak 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-1"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 translate-y-1"
                             class="absolute left-0 mt-4 w-56 bg-white border border-slate-100 shadow-xl rounded-xl py-2 z-50">
                            <a href="{{ route('fasilitas.laboratorium') }}" 
                               class="block px-4 py-2 text-sm transition {{ request()->routeIs('fasilitas.laboratorium') ? 'bg-blue-50 text-blue-600 font-bold' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-600' }}">Laboratorium</a>
                        </div>
                    </div>

                    <!-- Publikasi Dropdown -->
                    <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="text-sm font-bold transition flex items-center gap-1 {{ request()->routeIs('berita.*') || request()->routeIs('agenda.*') || request()->routeIs('unduhan.*') ? 'text-blue-600' : 'text-slate-600 hover:text-blue-600' }}" :class="open ? 'text-blue-600' : ''">
                            Publikasi <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="absolute h-4 w-full top-full"></div> <!-- Bridge to prevent closing on gap hover -->
                        <div x-show="open" 
                             x-cloak 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-1"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 translate-y-1"
                             class="absolute left-0 mt-4 w-56 bg-white border border-slate-100 shadow-xl rounded-xl py-2 z-50">
                            <a href="{{ route('berita.index') }}" 
                               class="block px-4 py-2 text-sm transition {{ request()->routeIs('berita.*') ? 'bg-blue-50 text-blue-600 font-bold' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-600' }}">Berita</a>
                            <a href="{{ route('agenda.index') }}" 
                               class="block px-4 py-2 text-sm transition {{ request()->routeIs('agenda.*') ? 'bg-blue-50 text-blue-600 font-bold' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-600' }}">Agenda</a>
                            <a href="{{ route('unduhan.index') }}" 
                               class="block px-4 py-2 text-sm transition {{ request()->routeIs('unduhan.*') ? 'bg-blue-50 text-blue-600 font-bold' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-600' }}">Unduhan</a>
                        </div>
                    </div>

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
                    <a href="{{ route('home') }}" 
                       class="font-bold {{ request()->routeIs('home') ? 'text-blue-600' : 'text-slate-700' }}">Beranda</a>
                    <div x-data="{ open: {{ request()->routeIs('profil.*') ? 'true' : 'false' }} }">
                        <button @click="open = !open" 
                                class="w-full flex justify-between items-center font-bold {{ request()->routeIs('profil.*') ? 'text-blue-600' : 'text-slate-700' }}">
                            Profil <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="pl-4 mt-2 flex flex-col gap-2">
                            <a href="{{ route('profil.vision-mission') }}" 
                               class="text-sm {{ request()->routeIs('profil.vision-mission') ? 'text-blue-600 font-bold' : 'text-slate-600' }}">Visi & Misi</a>
                            <a href="{{ route('profil.organizational-structure') }}" 
                               class="text-sm {{ request()->routeIs('profil.organizational-structure') ? 'text-blue-600 font-bold' : 'text-slate-600' }}">Struktur Organisasi</a>
                        </div>
                    </div>
                    <div x-data="{ open: {{ request()->routeIs('fasilitas.*') ? 'true' : 'false' }} }">
                        <button @click="open = !open" 
                                class="w-full flex justify-between items-center font-bold {{ request()->routeIs('fasilitas.*') ? 'text-blue-600' : 'text-slate-700' }}">
                            Fasilitas <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="pl-4 mt-2 flex flex-col gap-2">
                            <a href="{{ route('fasilitas.laboratorium') }}" 
                               class="text-sm {{ request()->routeIs('fasilitas.laboratorium') ? 'text-blue-600 font-bold' : 'text-slate-600' }}">Laboratorium</a>
                        </div>
                    </div>
                    <div x-data="{ open: {{ request()->routeIs('berita.*') || request()->routeIs('agenda.*') || request()->routeIs('unduhan.*') ? 'true' : 'false' }} }">
                        <button @click="open = !open" 
                                class="w-full flex justify-between items-center font-bold {{ request()->routeIs('berita.*') || request()->routeIs('agenda.*') || request()->routeIs('unduhan.*') ? 'text-blue-600' : 'text-slate-700' }}">
                            Publikasi <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="pl-4 mt-2 flex flex-col gap-2">
                            <a href="{{ route('berita.index') }}" 
                               class="text-sm {{ request()->routeIs('berita.*') ? 'text-blue-600 font-bold' : 'text-slate-600' }}">Berita</a>
                            <a href="{{ route('agenda.index') }}" 
                               class="text-sm {{ request()->routeIs('agenda.*') ? 'text-blue-600 font-bold' : 'text-slate-600' }}">Agenda</a>
                            <a href="{{ route('unduhan.index') }}" 
                               class="text-sm {{ request()->routeIs('unduhan.*') ? 'text-blue-600 font-bold' : 'text-slate-600' }}">Unduhan</a>
                        </div>
                    </div>
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
                    <p class="text-sm leading-relaxed mb-6">{{ \App\Models\Setting::get('footer_about', 'Pusat informasi dan layanan digital Laboratorium Komputer untuk mendukung kegiatan akademik dan riset teknologi informasi.') }}</p>
                    <div class="flex gap-4">
                        @if(\App\Models\Setting::get('social_facebook'))
                            <a href="{{ \App\Models\Setting::get('social_facebook') }}" target="_blank" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('social_instagram'))
                            <a href="{{ \App\Models\Setting::get('social_instagram') }}" target="_blank" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('social_youtube'))
                            <a href="{{ \App\Models\Setting::get('social_youtube') }}" target="_blank" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition"><i class="fab fa-youtube"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('social_linkedin'))
                            <a href="{{ \App\Models\Setting::get('social_linkedin') }}" target="_blank" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('social_tiktok'))
                            <a href="{{ \App\Models\Setting::get('social_tiktok') }}" target="_blank" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition"><i class="fab fa-tiktok"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('social_twitter'))
                            <a href="{{ \App\Models\Setting::get('social_twitter') }}" target="_blank" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition"><i class="fab fa-x-twitter"></i></a>
                        @endif
                    </div>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-6">Profil</h4>
                    <ul class="flex flex-col gap-3 text-sm">
                        <li><a href="{{ route('profil.vision-mission') }}" class="hover:text-blue-400 transition">Visi & Misi</a></li>
                        <li><a href="{{ route('profil.organizational-structure') }}" class="hover:text-blue-400 transition">Struktur Organisasi</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-6">Fasilitas & Informasi</h4>
                    <ul class="flex flex-col gap-3 text-sm">
                        <li><a href="{{ route('fasilitas.laboratorium') }}" class="hover:text-blue-400 transition">Laboratorium</a></li>
                        <li><a href="{{ route('agenda.index') }}" class="hover:text-blue-400 transition">Agenda Kegiatan</a></li>
                        <li><a href="{{ route('unduhan.index') }}" class="hover:text-blue-400 transition">Unduhan Dokumen</a></li>
                        <li><a href="{{ route('home') }}#faq" class="hover:text-blue-400 transition">Tanya Jawab (FAQ)</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-6">Hubungi Kami</h4>
                    <ul class="flex flex-col gap-4 text-sm">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>{{ \App\Models\Setting::get('footer_address', 'Gedung Laboratorium Terpadu, Lt. 3, Kampus Utama.') }}</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>{{ \App\Models\Setting::get('footer_email', 'labkom@institusi.ac.id') }}</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>{{ \App\Models\Setting::get('footer_phone', '+62 123 4567 890') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container mx-auto px-4 lg:px-8 border-t border-slate-800 mt-16 pt-8 text-center text-xs">
                <p>{{ \App\Models\Setting::get('footer_copyright', '© 2026 Laboratorium Komputer. All rights reserved.') }} Powered by Laravel & Tailwind CSS.</p>
            </div>
        </footer>
    </div>
</body>
</html>
