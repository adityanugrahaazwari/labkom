@extends('layouts.public')

@section('title', 'Visi & Misi - Labkom')

@section('content')
<div class="bg-blue-600 py-16">
    <div class="container mx-auto px-4 lg:px-8">
        <h1 class="text-4xl font-bold text-white mb-4">Visi & Misi</h1>
        <p class="text-blue-100 text-lg">Landasan utama arah pengembangan Laboratorium Komputer.</p>
    </div>
</div>

<div class="container mx-auto px-4 lg:px-8 py-16">
    <div class="max-w-4xl mx-auto">
        <section class="mb-16">
            <h2 class="text-2xl font-bold mb-6 flex items-center gap-3">
                <span class="w-10 h-1 bg-blue-600 rounded-full"></span>
                Visi
            </h2>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                <p class="text-lg text-slate-700 leading-relaxed italic">
                    "{{ $visionMission->vision ?? 'Belum ada visi.' }}"
                </p>
            </div>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-6 flex items-center gap-3">
                <span class="w-10 h-1 bg-blue-600 rounded-full"></span>
                Misi
            </h2>
            <div class="grid gap-6">
                @if($visionMission && is_array($visionMission->missions))
                    @foreach($visionMission->missions as $index => $point)
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex gap-4 hover:shadow-md transition">
                            <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center font-bold shrink-0">{{ $index + 1 }}</div>
                            <p class="text-slate-700">{{ $point }}</p>
                        </div>
                    @endforeach
                @else
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 text-center text-slate-500">
                        Belum ada misi.
                    </div>
                @endif
            </div>
        </section>
    </div>
</div>
@endsection
