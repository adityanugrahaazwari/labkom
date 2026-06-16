<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard') | LabKom</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-sans antialiased bg-slate-100 text-slate-900">
    <div x-data="{ sidebarOpen: true }" class="flex min-h-screen">
        <!-- Sidebar -->
        <aside 
            :class="sidebarOpen ? 'w-64' : 'w-20'" 
            class="bg-slate-900 text-slate-400 flex-shrink-0 transition-all duration-300 flex flex-col z-50 fixed inset-y-0 lg:static"
        >
            <!-- Sidebar Header -->
            <div class="h-20 flex items-center px-6 gap-3 border-b border-slate-800 shrink-0">
                <div class="w-8 h-8 bg-blue-600 rounded flex items-center justify-center text-white font-bold shrink-0">L</div>
                <span x-show="sidebarOpen" class="font-bold text-white text-lg tracking-tight overflow-hidden whitespace-nowrap">LABKOM CMS</span>
            </div>

            <!-- Sidebar Nav -->
            <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-2 custom-scrollbar">
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-blue-600/10 text-blue-500 font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span x-show="sidebarOpen">Dashboard</span>
                </a>

                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg hover:bg-slate-800 hover:text-white transition group">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                            <span x-show="sidebarOpen">Konten</span>
                        </div>
                        <svg x-show="sidebarOpen" :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open && sidebarOpen" x-cloak class="mt-2 ml-8 space-y-1">
                        <a href="#" class="block py-2 text-sm hover:text-white transition">Berita</a>
                        <a href="#" class="block py-2 text-sm hover:text-white transition">Pengumuman</a>
                        <a href="#" class="block py-2 text-sm hover:text-white transition">Agenda</a>
                    </div>
                </div>

                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-slate-800 hover:text-white transition group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span x-show="sidebarOpen">Media Library</span>
                </a>

                <div class="pt-4 pb-2 px-3">
                    <span x-show="sidebarOpen" class="text-[10px] uppercase font-bold text-slate-600 tracking-widest">Pengaturan</span>
                </div>

                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-slate-800 hover:text-white transition group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <span x-show="sidebarOpen">Pengguna</span>
                </a>

                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-slate-800 hover:text-white transition group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span x-show="sidebarOpen">Konfigurasi</span>
                </a>
            </nav>

            <!-- Sidebar Footer -->
            <div class="p-4 border-t border-slate-800 shrink-0">
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" x-show="sidebarOpen" class="w-full bg-slate-800 rounded-xl p-3 flex items-center gap-3 hover:bg-slate-700 transition">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0D8ABC&color=fff" class="w-8 h-8 rounded-lg" alt="Avatar">
                        <div class="overflow-hidden text-left">
                            <p class="text-xs font-bold text-white truncate">{{ auth()->user()->name }}</p>
                            <p class="text-[10px] text-slate-500 truncate">Super Admin</p>
                        </div>
                    </button>

                    <div x-show="open" @click.away="open = false" x-cloak class="absolute bottom-full left-0 w-full mb-2 bg-slate-800 border border-slate-700 rounded-xl py-2 shadow-xl z-50">
                        <a href="#" class="block px-4 py-2 text-xs text-slate-300 hover:text-white hover:bg-slate-700 transition">Profil Saya</a>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-xs text-red-400 hover:text-red-300 hover:bg-slate-700 transition">Keluar</button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- Topbar -->
            <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0">
                <button @click="sidebarOpen = !sidebarOpen" class="p-2 hover:bg-slate-50 rounded-lg transition text-slate-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>

                <div class="flex items-center gap-4">
                    <a href="/" target="_blank" class="hidden md:flex items-center gap-2 text-sm font-medium text-slate-600 hover:text-blue-600 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        Lihat Website
                    </a>
                    <div class="w-px h-6 bg-slate-200 mx-2"></div>
                    <button class="p-2 hover:bg-slate-50 rounded-lg transition text-slate-500 relative">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 border-2 border-white rounded-full"></span>
                    </button>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-8 overflow-y-auto">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h1 class="text-2xl font-bold text-slate-900">@yield('title')</h1>
                        <p class="text-sm text-slate-500 mt-1">@yield('subtitle')</p>
                    </div>
                    <div>
                        @yield('actions')
                    </div>
                </div>

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
