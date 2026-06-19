@extends('layouts.public')

@section('title', 'Detail Berita - Labkom')

@section('content')
<div class="bg-blue-600 py-12">
    <div class="container mx-auto px-4 lg:px-8">
        <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 text-blue-100 mb-6 hover:text-white transition text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg> Kembali ke Berita
        </a>
        <h1 class="text-3xl md:text-5xl font-bold text-white leading-tight">{{ $news->title }}</h1>
    </div>
</div>

<div class="container mx-auto px-4 lg:px-8 py-12">
    <div class="flex flex-col lg:flex-row gap-12">
        <div class="lg:w-2/3">
            @if($news->image)
                <div class="aspect-video bg-slate-100 rounded-3xl mb-8 overflow-hidden">
                    <img src="{{ asset('storage/' . $news->image) }}" class="w-full h-full object-cover">
                </div>
            @endif
            
            <div class="flex items-center gap-6 text-sm text-slate-500 mb-8 pb-8 border-b border-slate-100">
                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> 
                    {{ $news->published_at ? $news->published_at->format('d M Y') : $news->created_at->format('d M Y') }}
                </span>
                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg> 
                    {{ $news->user->name ?? 'Admin Labkom' }}
                </span>
                <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full font-bold">
                    {{ $news->category->name }}
                </span>
                <span class="text-xs font-mono text-slate-400 ml-auto">{{ number_format($news->views) }} views</span>
            </div>

            <div class="prose prose-slate prose-lg max-w-none text-slate-700 leading-relaxed font-medium">
                {!! nl2br($news->content) !!}
            </div>

            <div class="mt-12 pt-8 border-t border-slate-100">
                <h4 class="font-bold mb-4 text-slate-800 text-sm">Bagikan Halaman:</h4>
                <div class="flex gap-3">
                    <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"></path></svg>
                    </a>
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($news->title . ' - ' . request()->fullUrl()) }}" target="_blank" class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center hover:bg-emerald-600 hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.73-1.45L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.86-4.37 9.864-9.799.002-2.63-1.023-5.101-2.885-6.965C16.528 2.028 14.07 1.001 11.44 1a9.833 9.833 0 0 0-9.843 9.8c-.002 1.767.465 3.493 1.353 5.03L1.93 22.063l6.236-1.637z"></path></svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="lg:w-1/3">
            <div class="sticky top-32 space-y-8">
                <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
                    <h4 class="font-bold text-base text-slate-800 mb-6">Berita Terbaru</h4>
                    <div class="space-y-6">
                        @forelse($latestNews as $latest)
                        <a href="{{ route('berita.show', $latest->slug) }}" class="group block border-b border-slate-50 pb-4 last:border-0 last:pb-0">
                            <span class="text-[10px] text-slate-400 block mb-1 font-medium">{{ $latest->published_at ? $latest->published_at->format('d M Y') : $latest->created_at->format('d M Y') }}</span>
                            <p class="font-bold text-slate-800 group-hover:text-blue-600 transition leading-snug text-sm">{{ $latest->title }}</p>
                        </a>
                        @empty
                        <p class="text-xs text-slate-400 italic">Tidak ada berita terbaru lainnya.</p>
                        @endforelse
                    </div>
                </div>

                <div class="bg-blue-600 p-8 rounded-3xl text-white shadow-md">
                    <h4 class="font-bold text-lg mb-3">Butuh Bantuan?</h4>
                    <p class="text-blue-100 text-xs mb-6 leading-relaxed">Hubungi admin lab jika Anda memiliki pertanyaan seputar kegiatan, modul, atau layanan di Laboratorium Komputer.</p>
                    <a href="/#kontak" class="block w-full py-3 bg-white text-blue-600 text-center text-xs font-bold rounded-xl hover:bg-blue-50 transition">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
