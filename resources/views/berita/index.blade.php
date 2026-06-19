@extends('layouts.public')

@section('title', 'Berita & Kegiatan - Labkom')

@section('content')
<div class="bg-blue-600 py-16">
    <div class="container mx-auto px-4 lg:px-8">
        <h1 class="text-4xl font-bold text-white mb-4">Berita & Kegiatan</h1>
        <p class="text-blue-100 text-lg">Informasi terbaru seputar aktivitas di Laboratorium Komputer.</p>
    </div>
</div>

<div class="container mx-auto px-4 lg:px-8 py-12">
    <div class="max-w-6xl mx-auto space-y-8">
        <!-- Categories Filter -->
        <div class="flex flex-wrap gap-2 pb-4 border-b border-slate-100">
            <a href="{{ route('berita.index') }}" class="px-4 py-2 rounded-full text-xs font-bold transition {{ !request('kategori') ? 'bg-blue-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                Semua Kategori
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('berita.index', ['kategori' => $cat->slug]) }}" class="px-4 py-2 rounded-full text-xs font-bold transition {{ request('kategori') === $cat->slug ? 'bg-blue-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    {{ $cat->name }} ({{ $cat->news_count }})
                </a>
            @endforeach
        </div>

        <!-- News Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($news as $item)
            <article class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl hover:border-blue-100 transition duration-300 flex flex-col">
                <div class="aspect-video bg-slate-100 overflow-hidden relative">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-slate-300">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <div class="flex items-center gap-4 text-xs text-slate-500 mb-4">
                        <span class="flex items-center gap-1 font-medium">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            {{ $item->published_at ? $item->published_at->format('d M Y') : $item->created_at->format('d M Y') }}
                        </span>
                        <span class="px-2.5 py-0.5 bg-blue-50 text-blue-600 rounded-full font-bold">
                            {{ $item->category->name }}
                        </span>
                    </div>
                    <h3 class="text-lg font-bold mb-3 hover:text-blue-600 transition leading-snug line-clamp-2">
                        <a href="{{ route('berita.show', $item->slug) }}">{{ $item->title }}</a>
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6 line-clamp-3">
                        {{ strip_tags($item->content) }}
                    </p>
                    <div class="mt-auto flex items-center justify-between">
                        <a href="{{ route('berita.show', $item->slug) }}" class="text-blue-600 font-bold text-xs hover:underline flex items-center gap-1">
                            Baca Selengkapnya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                        <span class="text-[10px] text-slate-400 font-mono">{{ number_format($item->views) }} views</span>
                    </div>
                </div>
            </article>
            @empty
            <div class="col-span-3 bg-white border border-slate-200 rounded-3xl p-16 text-center text-slate-500 shadow-sm">
                <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                <h3 class="text-lg font-bold text-slate-700">Belum ada berita</h3>
                <p class="text-sm text-slate-400 mt-1">Belum ada artikel berita yang diterbitkan untuk kategori ini.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination Links -->
        <div class="mt-12">
            {{ $news->links() }}
        </div>
    </div>
@endsection
