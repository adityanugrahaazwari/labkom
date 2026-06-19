@extends('layouts.public')

@section('title', 'Fasilitas Laboratorium - Labkom')

@section('content')
<div class="bg-blue-600 py-16">
    <div class="container mx-auto px-4 lg:px-8">
        <h1 class="text-4xl font-bold text-white mb-4">Fasilitas Laboratorium</h1>
        <p class="text-blue-100 text-lg">Daftar laboratorium dan sarana pendukung yang tersedia.</p>
    </div>
</div>

<div class="container mx-auto px-4 lg:px-8 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($laboratories as $lab)
        <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm hover:shadow-xl transition-all group flex flex-col justify-between">
            <div>
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition overflow-hidden">
                    @if($lab->image)
                        <img src="{{ asset('storage/' . $lab->image) }}" class="w-full h-full object-cover">
                    @else
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    @endif
                </div>
                <h3 class="text-xl font-bold mb-1 text-slate-800">{{ $lab->name }}</h3>
                @if($lab->location)
                    <p class="text-xs text-slate-400 mb-3 font-medium flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        {{ $lab->location }}
                    </p>
                @endif
                <p class="text-slate-600 text-sm leading-relaxed mb-6 line-clamp-3">{{ strip_tags($lab->description) }}</p>
            </div>
            
            <div class="flex items-center justify-between mt-auto">
                <a href="{{ route('fasilitas.show', $lab->slug) }}" class="inline-flex items-center gap-2 text-blue-600 font-bold text-xs hover:gap-3 transition-all">
                    Lihat Detail <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
                @if($lab->head_of_lab)
                    <span class="text-[10px] bg-slate-50 border border-slate-100 text-slate-500 font-semibold px-2 py-0.5 rounded-full">PJ: {{ $lab->head_of_lab }}</span>
                @endif
            </div>
        </div>
        @empty
        <div class="col-span-3 bg-white border border-slate-200 rounded-3xl p-16 text-center text-slate-500 shadow-sm">
            <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            <h3 class="text-lg font-bold text-slate-700">Belum ada laboratorium</h3>
            <p class="text-sm text-slate-400 mt-1">Data fasilitas laboratorium belum dimasukkan oleh admin.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
