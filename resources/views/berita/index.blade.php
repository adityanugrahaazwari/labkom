@extends('layouts.public')

@section('title', 'Berita & Kegiatan - Labkom')

@section('content')
<div class="bg-blue-600 py-16">
    <div class="container mx-auto px-4 lg:px-8">
        <h1 class="text-4xl font-bold text-white mb-4">Berita & Kegiatan</h1>
        <p class="text-blue-100 text-lg">Informasi terbaru seputar aktivitas di Laboratorium Komputer.</p>
    </div>
</div>

<div class="container mx-auto px-4 lg:px-8 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @for($i = 1; $i <= 6; $i++)
        <article class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl transition flex flex-col">
            <div class="aspect-video bg-slate-200"></div>
            <div class="p-6 flex flex-col flex-1">
                <div class="flex items-center gap-4 text-xs text-slate-500 mb-4">
                    <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> 12 Juni 2026</span>
                    <span class="px-2 py-0.5 bg-blue-50 text-blue-600 rounded-full font-medium italic">Kegiatan</span>
                </div>
                <h3 class="text-xl font-bold mb-3 hover:text-blue-600 transition">
                    <a href="{{ route('berita.show', 'berita-' . $i) }}">Workshop Pemrograman Modern dengan Laravel 13 dan Tailwind CSS</a>
                </h3>
                <p class="text-slate-600 text-sm leading-relaxed mb-6 line-clamp-3">
                    Laboratorium Komputer menyelenggarakan workshop intensif untuk meningkatkan kompetensi mahasiswa dalam pengembangan web modern menggunakan teknologi terbaru...
                </p>
                <div class="mt-auto">
                    <a href="{{ route('berita.show', 'berita-' . $i) }}" class="text-blue-600 font-bold text-sm hover:underline">Baca Selengkapnya</a>
                </div>
            </div>
        </article>
        @endfor
    </div>

    <div class="mt-12 flex justify-center">
        <nav class="inline-flex gap-2">
            <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-600 hover:bg-blue-600 hover:text-white transition">1</a>
            <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-600 hover:bg-blue-600 hover:text-white transition">2</a>
            <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-600 hover:bg-blue-600 hover:text-white transition">3</a>
        </nav>
    </div>
</div>
@endsection
