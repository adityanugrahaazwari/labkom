@extends('layouts.public')

@section('title', 'Beranda | CMS Laboratorium Komputer')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-white overflow-hidden">
        <div class="container mx-auto px-4 lg:px-8 py-20 lg:py-32 flex flex-col lg:flex-row items-center gap-16">
            <div class="flex-1 text-center lg:text-left z-10">
                <span class="inline-block py-1 px-4 rounded-full bg-blue-50 text-blue-600 text-xs font-bold tracking-widest uppercase mb-6">Pusat Inovasi & Teknologi</span>
                <h1 class="text-5xl lg:text-7xl font-bold text-slate-900 leading-[1.1] mb-8">
                    Membangun Masa Depan <span class="text-blue-600">Digital</span> di Laboratorium Kami.
                </h1>
                <p class="text-lg text-slate-600 leading-relaxed mb-10 max-w-2xl mx-auto lg:mx-0">
                    Selamat datang di portal resmi Laboratorium Komputer. Kami menyediakan fasilitas modern dan riset mendalam untuk mendukung perkembangan teknologi informasi.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="#" class="w-full sm:w-auto px-8 py-4 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 transition shadow-lg shadow-blue-200">Eksplorasi Fasilitas</a>
                    <a href="#" class="w-full sm:w-auto px-8 py-4 bg-white text-slate-900 border border-slate-200 font-bold rounded-2xl hover:bg-slate-50 transition">Lihat Pengumuman</a>
                </div>
                <div class="mt-12 flex items-center justify-center lg:justify-start gap-8 grayscale opacity-50">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" class="h-8" alt="Laravel">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg" class="h-6" alt="Tailwind">
                    <span class="font-bold text-slate-400">ISO 9001:2015</span>
                </div>
            </div>
            <div class="flex-1 relative">
                <div class="absolute -top-20 -right-20 w-64 h-64 bg-blue-100 rounded-full blur-3xl opacity-50"></div>
                <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-indigo-100 rounded-full blur-3xl opacity-50"></div>
                <div class="relative bg-slate-100 rounded-[2rem] p-4 shadow-2xl overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&q=80&w=1200" class="rounded-[1.5rem] w-full aspect-[4/3] object-cover transition duration-700 group-hover:scale-105" alt="Lab Komputer">
                    <div class="absolute bottom-10 left-10 bg-white/90 backdrop-blur p-6 rounded-2xl shadow-xl border border-white/20">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path></svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 font-medium">Status Operasional</p>
                                <p class="font-bold text-slate-900">Lab Aktif & Terbuka</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-12 bg-slate-50 border-y border-slate-100">
        <div class="container mx-auto px-4 lg:px-8 grid grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <p class="text-4xl font-extrabold text-blue-600 mb-2">12</p>
                <p class="text-sm font-medium text-slate-500 uppercase tracking-widest">Laboratorium</p>
            </div>
            <div class="text-center">
                <p class="text-4xl font-extrabold text-blue-600 mb-2">500+</p>
                <p class="text-sm font-medium text-slate-500 uppercase tracking-widest">Unit Komputer</p>
            </div>
            <div class="text-center">
                <p class="text-4xl font-extrabold text-blue-600 mb-2">45</p>
                <p class="text-sm font-medium text-slate-500 uppercase tracking-widest">Asisten Lab</p>
            </div>
            <div class="text-center">
                <p class="text-4xl font-extrabold text-blue-600 mb-2">3k+</p>
                <p class="text-sm font-medium text-slate-500 uppercase tracking-widest">Alumni Praktikan</p>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-end justify-between mb-16">
                <div class="max-w-xl">
                    <span class="text-blue-600 font-bold text-sm tracking-widest uppercase mb-4 block">Update Terbaru</span>
                    <h2 class="text-4xl font-bold text-slate-900">Berita & Kegiatan</h2>
                </div>
                <a href="#" class="text-sm font-bold text-blue-600 flex items-center gap-2 group">
                    Lihat Semua Berita 
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @for ($i = 1; $i <= 3; $i++)
                <article class="group">
                    <div class="relative rounded-3xl overflow-hidden mb-6 aspect-video">
                        <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&q=80&w=800" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" alt="News Image">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-white/90 backdrop-blur text-[10px] font-bold uppercase tracking-wider rounded-full">Kegiatan</span>
                        </div>
                    </div>
                    <div>
                        <time class="text-xs text-slate-500 font-medium mb-3 block">12 Juni 2026</time>
                        <h3 class="text-xl font-bold text-slate-900 leading-snug group-hover:text-blue-600 transition mb-4">Workshop Implementasi Artificial Intelligence pada Sistem Embedded</h3>
                        <p class="text-slate-600 text-sm leading-relaxed line-clamp-2">Laboratorium Komputer menyelenggarakan workshop intensif mengenai penerapan AI pada perangkat keras terbatas...</p>
                    </div>
                </article>
                @endfor
            </div>
        </div>
    </section>

    <!-- Announcement & Agenda -->
    <section class="py-24 bg-slate-50">
        <div class="container mx-auto px-4 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Announcements -->
            <div>
                <h2 class="text-3xl font-bold text-slate-900 mb-10 flex items-center gap-3">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                    Pengumuman Resmi
                </h2>
                <div class="space-y-4">
                    @for ($i = 1; $i <= 4; $i++)
                    <div class="bg-white p-6 rounded-2xl border border-slate-100 hover:border-blue-200 transition group cursor-pointer">
                        <div class="flex gap-6">
                            <div class="shrink-0 flex flex-col items-center justify-center w-14 h-14 bg-slate-50 rounded-xl group-hover:bg-blue-50 transition">
                                <span class="text-xs font-bold text-slate-400 group-hover:text-blue-400">JUN</span>
                                <span class="text-xl font-black text-slate-900 group-hover:text-blue-600">1{{ $i }}</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 mb-1 group-hover:text-blue-600 transition">Pendaftaran Asisten Praktikum Semester Ganjil 2026/2027</h4>
                                <p class="text-xs text-slate-500 uppercase tracking-wider font-bold">Kategori: Akademik</p>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>

            <!-- Agenda -->
            <div>
                <h2 class="text-3xl font-bold text-slate-900 mb-10 flex items-center gap-3">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Agenda Mendatang
                </h2>
                <div class="bg-white rounded-3xl border border-slate-100 divide-y divide-slate-100 overflow-hidden shadow-sm">
                    @for ($i = 1; $i <= 3; $i++)
                    <div class="p-8 hover:bg-slate-50 transition">
                        <div class="flex items-start justify-between gap-4 mb-4">
                            <span class="px-3 py-1 bg-green-50 text-green-600 text-[10px] font-bold uppercase rounded-full tracking-wider">Open Registration</span>
                            <span class="text-sm font-medium text-slate-400 italic">Mulai dalam 3 Hari</span>
                        </div>
                        <h4 class="text-xl font-bold text-slate-900 mb-4">Seminar Nasional: Cybersecurity di Era Komputasi Kuantum</h4>
                        <div class="flex flex-wrap gap-6 text-sm text-slate-500">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                09:00 - 15:00 WIB
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                Auditorium Lantai 4
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-24 container mx-auto px-4 lg:px-8">
        <div class="bg-blue-600 rounded-[3rem] p-12 lg:p-20 text-center text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500 rounded-full -mr-48 -mt-48 blur-3xl opacity-50"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-indigo-500 rounded-full -ml-32 -mb-32 blur-3xl opacity-50"></div>
            
            <div class="relative z-10 max-w-3xl mx-auto">
                <h2 class="text-4xl lg:text-5xl font-black mb-8 leading-tight">Siap Memulai Riset atau Belajar Bersama Kami?</h2>
                <p class="text-blue-100 text-lg mb-12 leading-relaxed">Jangan ragu untuk menghubungi kami jika ada pertanyaan mengenai fasilitas, pendaftaran asisten, atau kolaborasi riset.</p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="#" class="w-full sm:w-auto px-10 py-5 bg-white text-blue-600 font-bold rounded-2xl hover:bg-slate-50 transition shadow-xl">Hubungi Kontak Resmi</a>
                    <a href="#" class="w-full sm:w-auto px-10 py-5 bg-blue-700 text-white font-bold rounded-2xl hover:bg-blue-800 transition">Download Profil PDF</a>
                </div>
            </div>
        </div>
    </section>
@endsection
