@extends('layouts.public')

@section('title', 'Detail Laboratorium - Labkom')

@section('content')
<div class="bg-blue-600 py-12">
    <div class="container mx-auto px-4 lg:px-8">
        <a href="{{ route('fasilitas.laboratorium') }}" class="inline-flex items-center gap-2 text-blue-100 mb-6 hover:text-white transition text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg> Kembali ke Fasilitas
        </a>
        <h1 class="text-3xl md:text-5xl font-bold text-white leading-tight">Laboratorium Programming</h1>
    </div>
</div>

<div class="container mx-auto px-4 lg:px-8 py-12">
    <div class="flex flex-col lg:flex-row gap-12">
        <div class="lg:w-2/3">
            <!-- Image Gallery Placeholder -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                <div class="aspect-video bg-slate-200 rounded-3xl overflow-hidden md:col-span-2"></div>
                <div class="aspect-video bg-slate-100 rounded-3xl overflow-hidden"></div>
                <div class="aspect-video bg-slate-100 rounded-3xl overflow-hidden"></div>
            </div>

            <div class="prose prose-slate prose-lg max-w-none text-slate-700 leading-relaxed mb-12">
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Deskripsi Laboratorium</h2>
                <p>Laboratorium Programming merupakan pusat pengembangan perangkat lunak yang dirancang untuk mendukung mahasiswa dalam mempelajari berbagai bahasa pemrograman, algoritma, dan metodologi pengembangan sistem. Laboratorium ini dilengkapi dengan workstation performa tinggi dan lingkungan pengembangan terkini.</p>
                <p>Fokus utama kami adalah memberikan pengalaman praktis dalam membangun aplikasi berbasis web, mobile, maupun desktop dengan standar industri saat ini.</p>
                
                <h3 class="text-xl font-bold text-slate-900 mt-8 mb-4">Layanan & Kegiatan</h3>
                <ul>
                    <li>Praktikum Pemrograman Dasar & Lanjut.</li>
                    <li>Riset Pengembangan Perangkat Lunak.</li>
                    <li>Workshop & Bootcamp Coding berkala.</li>
                    <li>Bimbingan Teknis Tugas Akhir.</li>
                </ul>
            </div>

            <!-- Peralatan Section -->
            <section class="mb-12">
                <h3 class="text-xl font-bold text-slate-900 mb-6">Fasilitas Utama</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="flex items-center gap-4 p-4 bg-white border border-slate-100 rounded-2xl shadow-sm">
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 21h6l-.75-4M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <span class="block font-bold">40 Unit PC High-End</span>
                            <span class="text-xs text-slate-500">Intel i7, 16GB RAM, SSD 512GB</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 p-4 bg-white border border-slate-100 rounded-2xl shadow-sm">
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 117.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.256-3.905 14.162 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path></svg>
                        </div>
                        <div>
                            <span class="block font-bold">Akses Internet Cepat</span>
                            <span class="text-xs text-slate-500">Dedicated Fiber Optic 100 Mbps</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 p-4 bg-white border border-slate-100 rounded-2xl shadow-sm">
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <div>
                            <span class="block font-bold">Smart Board & Proyektor</span>
                            <span class="text-xs text-slate-500">Mendukung Presentasi Interaktif</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 p-4 bg-white border border-slate-100 rounded-2xl shadow-sm">
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <span class="block font-bold">Full AC & Co-working Area</span>
                            <span class="text-xs text-slate-500">Lingkungan Belajar yang Nyaman</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="lg:w-1/3">
            <div class="sticky top-32 space-y-8">
                <!-- Kontak & Info Lab -->
                <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
                    <h4 class="font-bold text-lg mb-6 text-slate-900 border-b border-slate-100 pb-4">Informasi Lab</h4>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <div>
                                <span class="block text-xs text-slate-400 uppercase tracking-wider font-bold mb-1">Kepala Lab</span>
                                <span class="font-bold text-slate-700">Dr. Aditya, M.T.</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <span class="block text-xs text-slate-400 uppercase tracking-wider font-bold mb-1">Lokasi</span>
                                <span class="font-bold text-slate-700">Gedung Lab Terpadu, Lt. 3</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <span class="block text-xs text-slate-400 uppercase tracking-wider font-bold mb-1">Jam Operasional</span>
                                <span class="font-bold text-slate-700">08:00 - 16:00 WIB</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Card -->
                <div class="bg-slate-900 p-8 rounded-3xl text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-600 rounded-full -translate-y-1/2 translate-x-1/2 blur-2xl opacity-50"></div>
                    <div class="relative z-10">
                        <h4 class="font-bold text-lg mb-4">Butuh Penggunaan Lab?</h4>
                        <p class="text-slate-400 text-sm mb-6 leading-relaxed">Silakan unduh formulir peminjaman alat atau ruangan melalui pusat unduhan kami.</p>
                        <a href="{{ route('unduhan.index') }}" class="block w-full py-4 bg-blue-600 text-white text-center font-bold rounded-2xl hover:bg-blue-700 transition shadow-lg shadow-blue-600/20">Ke Pusat Unduhan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
