@extends('layouts.public')

@section('title', $agenda->title . ' - Labkom')

@section('content')
<div class="bg-blue-600 py-12">
    <div class="container mx-auto px-4 lg:px-8">
        <a href="{{ route('agenda.index') }}" class="inline-flex items-center gap-2 text-blue-100 mb-6 hover:text-white transition text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg> Kembali ke Agenda
        </a>
        <h1 class="text-3xl md:text-5xl font-bold text-white leading-tight">{{ $agenda->title }}</h1>
    </div>
</div>

<div class="container mx-auto px-4 lg:px-8 py-12">
    <div class="flex flex-col lg:flex-row gap-12">
        <div class="lg:w-2/3">
            @if($agenda->image)
                <div class="aspect-video bg-slate-100 rounded-3xl mb-8 overflow-hidden">
                    <img src="{{ asset('storage/' . $agenda->image) }}" class="w-full h-full object-cover">
                </div>
            @endif

            <div class="prose prose-slate prose-lg max-w-none text-slate-700 leading-relaxed font-medium">
                <h2 class="text-2xl font-bold text-slate-900 mb-4">Rincian Kegiatan</h2>
                {!! nl2br($agenda->description) !!}
            </div>
        </div>

        <div class="lg:w-1/3">
            <div class="sticky top-32 space-y-8">
                <!-- Event Meta Information -->
                <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
                    <h4 class="font-bold text-base text-slate-800 mb-6 border-b border-slate-100 pb-4">Waktu & Tempat</h4>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <span class="block text-xs text-slate-400 uppercase tracking-wider font-bold mb-1">Tanggal Pelaksanaan</span>
                                <span class="font-bold text-slate-700">{{ $agenda->event_date->format('d F Y') }}</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <span class="block text-xs text-slate-400 uppercase tracking-wider font-bold mb-1">Waktu</span>
                                <span class="font-bold text-slate-700">
                                    @if($agenda->start_time)
                                        {{ substr($agenda->start_time, 0, 5) }}@if($agenda->end_time) - {{ substr($agenda->end_time, 0, 5) }}@endif WIB
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <span class="block text-xs text-slate-400 uppercase tracking-wider font-bold mb-1">Lokasi Ruang</span>
                                <span class="font-bold text-slate-700">{{ $agenda->location }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Registration / Help Card -->
                <div class="bg-slate-900 p-8 rounded-3xl text-white relative overflow-hidden shadow-lg">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-600 rounded-full -translate-y-1/2 translate-x-1/2 blur-2xl opacity-50"></div>
                    <div class="relative z-10">
                        <h4 class="font-bold text-base mb-3">Ingin Berpartisipasi?</h4>
                        <p class="text-slate-400 text-xs mb-6 leading-relaxed">Silakan tanyakan syarat pendaftaran, batasan kuota, and teknis kegiatan langsung kepada asisten atau admin lab.</p>
                        <a href="/#kontak" class="block w-full py-4 bg-blue-600 text-white text-center text-xs font-bold rounded-2xl hover:bg-blue-700 transition shadow-lg shadow-blue-600/20">Kontak Admin Lab</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
