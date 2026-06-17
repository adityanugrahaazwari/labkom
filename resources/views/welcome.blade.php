@extends('layouts.public')

@section('title', 'Beranda - CMS Laboratorium Komputer')

@section('content')
<!-- Hero Section -->
<section class="relative bg-slate-900 pt-32 pb-48 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-transparent"></div>
        <div class="grid grid-cols-12 h-full w-full">
            @for($i = 0; $i < 48; $i++)
                <div class="border-[0.5px] border-slate-700 aspect-square"></div>
            @endfor
        </div>
    </div>
    
    <div class="container mx-auto px-4 lg:px-8 relative z-10 text-center">
        <span class="inline-block px-4 py-1.5 bg-blue-600/20 text-blue-400 text-xs font-bold rounded-full border border-blue-600/30 mb-6 uppercase tracking-widest">Digital Excellence</span>
        <h1 class="text-4xl md:text-7xl font-bold text-white mb-8 leading-tight">
            Pusat Inovasi & <br> <span class="text-blue-500">Riset Teknologi</span>
        </h1>
        <p class="text-slate-400 text-lg md:text-xl max-w-3xl mx-auto mb-12 leading-relaxed">
            Selamat datang di portal resmi Laboratorium Komputer. Kami menyediakan fasilitas modern dan ekosistem riset untuk mendukung kemajuan teknologi informasi.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('berita.index') }}" class="w-full sm:w-auto px-8 py-4 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 transition shadow-lg shadow-blue-600/20">Jelajahi Kegiatan</a>
            <a href="{{ route('profil.visi-misi') }}" class="w-full sm:w-auto px-8 py-4 bg-white/10 text-white font-bold rounded-2xl hover:bg-white/20 transition border border-white/10 backdrop-blur-sm">Tentang Kami</a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="container mx-auto px-4 lg:px-8 -mt-24 relative z-20">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8">
        <div class="bg-white p-8 rounded-3xl shadow-xl border border-slate-100 text-center">
            <div class="text-4xl font-bold text-slate-900 mb-2">12+</div>
            <div class="text-sm text-slate-500 font-medium uppercase tracking-wider">Laboratorium</div>
        </div>
        <div class="bg-white p-8 rounded-3xl shadow-xl border border-slate-100 text-center">
            <div class="text-4xl font-bold text-slate-900 mb-2">500+</div>
            <div class="text-sm text-slate-500 font-medium uppercase tracking-wider">Mahasiswa</div>
        </div>
        <div class="bg-white p-8 rounded-3xl shadow-xl border border-slate-100 text-center">
            <div class="text-4xl font-bold text-slate-900 mb-2">50+</div>
            <div class="text-sm text-slate-500 font-medium uppercase tracking-wider">Riset/Tahun</div>
        </div>
        <div class="bg-white p-8 rounded-3xl shadow-xl border border-slate-100 text-center">
            <div class="text-4xl font-bold text-slate-900 mb-2">24/7</div>
            <div class="text-sm text-slate-500 font-medium uppercase tracking-wider">Akses Digital</div>
        </div>
    </div>
</section>

<!-- Sambutan Section -->
<section class="py-32">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2 relative">
                <div class="aspect-square bg-slate-200 rounded-[3rem] overflow-hidden"></div>
                <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-blue-600 rounded-3xl -z-10"></div>
            </div>
            <div class="lg:w-1/2">
                <h2 class="text-sm font-bold text-blue-600 uppercase tracking-widest mb-4">Sambutan Kepala Lab</h2>
                <h3 class="text-3xl md:text-5xl font-bold text-slate-900 mb-8 leading-tight">Membangun Masa Depan Melalui Teknologi</h3>
                <p class="text-slate-600 text-lg leading-relaxed mb-8 italic">
                    "Laboratorium Komputer bukan sekadar tempat praktikum, melainkan inkubator kreativitas dan pusat pengembangan solusi teknologi yang relevan dengan kebutuhan industri."
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-1 bg-blue-600 rounded-full"></div>
                    <div>
                        <div class="font-bold text-lg">Dr. Aditya, S.Kom., M.T.</div>
                        <div class="text-sm text-slate-500">Kepala Laboratorium Komputer</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest News Ringkasan -->
<section class="bg-slate-50 py-32 border-y border-slate-200">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex justify-between items-end mb-16">
            <div>
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Berita Terbaru</h2>
                <p class="text-slate-500">Ikuti perkembangan kegiatan dan prestasi kami.</p>
            </div>
            <a href="{{ route('berita.index') }}" class="hidden md:flex items-center gap-2 text-blue-600 font-bold hover:gap-3 transition-all">
                Semua Berita <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @for($i = 1; $i <= 3; $i++)
            <article class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl transition flex flex-col group">
                <div class="aspect-video bg-slate-200 group-hover:scale-105 transition duration-500"></div>
                <div class="p-8 flex flex-col flex-1">
                    <div class="text-xs text-slate-400 mb-4 uppercase tracking-widest font-bold">12 Juni 2026</div>
                    <h4 class="text-xl font-bold mb-4 group-hover:text-blue-600 transition">Workshop Pemrograman Modern Laravel 13</h4>
                    <p class="text-slate-500 text-sm leading-relaxed mb-8 line-clamp-2">Deskripsi singkat kegiatan yang memberikan gambaran umum tentang isi berita yang dipublikasikan...</p>
                    <a href="{{ route('berita.show', 'berita-'.$i) }}" class="mt-auto text-blue-600 font-bold text-sm">Baca Selengkapnya</a>
                </div>
            </article>
            @endfor
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-32">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="bg-blue-600 rounded-[3rem] p-8 md:p-24 text-center text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
            <div class="relative z-10 max-w-3xl mx-auto">
                <h2 class="text-3xl md:text-5xl font-bold mb-8">Siap Berkolaborasi dan Berinovasi Bersama Kami?</h2>
                <p class="text-blue-100 text-lg mb-12">Akses modul praktikum, formulir layanan, dan informasi lainnya melalui pusat unduhan kami.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('unduhan.index') }}" class="px-8 py-4 bg-white text-blue-600 font-bold rounded-2xl hover:bg-blue-50 transition">Pusat Unduhan</a>
                    <a href="#" class="px-8 py-4 bg-blue-700 text-white font-bold rounded-2xl hover:bg-blue-800 transition border border-blue-500">Kontak Kami</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
