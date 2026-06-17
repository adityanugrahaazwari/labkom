@extends('layouts.public')

@section('title', 'Detail Berita - Labkom')

@section('content')
<div class="bg-blue-600 py-12">
    <div class="container mx-auto px-4 lg:px-8">
        <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 text-blue-100 mb-6 hover:text-white transition text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg> Kembali ke Berita
        </a>
        <h1 class="text-3xl md:text-5xl font-bold text-white leading-tight">Workshop Pemrograman Modern dengan Laravel 13 dan Tailwind CSS</h1>
    </div>
</div>

<div class="container mx-auto px-4 lg:px-8 py-12">
    <div class="flex flex-col lg:flex-row gap-12">
        <div class="lg:w-2/3">
            <div class="aspect-video bg-slate-200 rounded-3xl mb-8"></div>
            
            <div class="flex items-center gap-6 text-sm text-slate-500 mb-8 pb-8 border-b border-slate-100">
                <span class="flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> 12 Juni 2026</span>
                <span class="flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg> Admin Labkom</span>
                <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full font-medium italic">Kegiatan</span>
            </div>

            <div class="prose prose-slate prose-lg max-w-none text-slate-700 leading-relaxed">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <h3>Tujuan Workshop</h3>
                <ul>
                    <li>Memahami fundamental Laravel 13.</li>
                    <li>Menguasai utility-first CSS dengan Tailwind.</li>
                    <li>Membangun komponen interaktif dengan Alpine.js.</li>
                </ul>
                <p>Kegiatan ini akan dilaksanakan secara luring di Laboratorium Programming pada akhir bulan ini. Seluruh mahasiswa aktif diharapkan dapat berpartisipasi dalam agenda tahunan ini.</p>
            </div>

            <div class="mt-12 pt-8 border-t border-slate-100">
                <h4 class="font-bold mb-4">Bagikan:</h4>
                <div class="flex gap-4">
                    <button class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition"><i class="fab fa-facebook-f"></i></button>
                    <button class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition"><i class="fab fa-twitter"></i></button>
                    <button class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition"><i class="fab fa-whatsapp"></i></button>
                </div>
            </div>
        </div>

        <div class="lg:w-1/3">
            <div class="sticky top-32 space-y-8">
                <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
                    <h4 class="font-bold text-lg mb-6">Berita Terkait</h4>
                    <div class="space-y-6">
                        @for($i = 1; $i <= 3; $i++)
                        <a href="#" class="group block">
                            <span class="text-xs text-slate-400 block mb-1">10 Juni 2026</span>
                            <p class="font-bold text-slate-800 group-hover:text-blue-600 transition leading-snug">Pembaruan Fasilitas Lab Networking dengan Server Terbaru</p>
                        </a>
                        @endfor
                    </div>
                </div>

                <div class="bg-blue-600 p-8 rounded-3xl text-white">
                    <h4 class="font-bold text-lg mb-4">Butuh Bantuan?</h4>
                    <p class="text-blue-100 text-sm mb-6">Hubungi admin lab jika Anda memiliki pertanyaan seputar kegiatan ini.</p>
                    <a href="#" class="block w-full py-3 bg-white text-blue-600 text-center font-bold rounded-xl hover:bg-blue-50 transition">Kontak Admin</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
