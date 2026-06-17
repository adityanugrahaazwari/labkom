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
        @php
            $labs = [
                ['name' => 'Laboratorium Programming', 'desc' => 'Fokus pada pengembangan perangkat lunak dan algoritma.', 'icon' => 'code'],
                ['name' => 'Laboratorium Networking', 'desc' => 'Fokus pada infrastruktur jaringan dan keamanan siber.', 'icon' => 'server'],
                ['name' => 'Laboratorium Multimedia', 'desc' => 'Fokus pada desain grafis, video editing, dan animasi.', 'icon' => 'video'],
                ['name' => 'Laboratorium AI & Data Science', 'desc' => 'Fokus pada kecerdasan buatan dan pengolahan data.', 'icon' => 'brain'],
                ['name' => 'Laboratorium Hardware', 'desc' => 'Fokus pada perakitan, maintenance, dan robotika.', 'icon' => 'cpu'],
            ];
        @endphp

        @foreach($labs as $lab)
        <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm hover:shadow-xl transition-all group">
            <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 21h6l-.75-4M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <h3 class="text-xl font-bold mb-3">{{ $lab['name'] }}</h3>
            <p class="text-slate-600 leading-relaxed mb-6">{{ $lab['desc'] }}</p>
            <a href="{{ route('fasilitas.show', Str::slug($lab['name'])) }}" class="inline-flex items-center gap-2 text-blue-600 font-bold text-sm hover:gap-3 transition-all">
                Lihat Detail <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
