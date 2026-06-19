@extends('layouts.public')

@section('title', 'Agenda Kegiatan - Labkom')

@section('content')
<div class="bg-blue-600 py-16">
    <div class="container mx-auto px-4 lg:px-8">
        <h1 class="text-4xl font-bold text-white mb-4">Agenda Kegiatan</h1>
        <p class="text-blue-100 text-lg">Ikuti berbagai workshop, pelatihan, dan seminar di Laboratorium Komputer.</p>
    </div>
</div>

<div class="container mx-auto px-4 lg:px-8 py-16">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($agendas as $agenda)
                <div class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group">
                    <div class="aspect-video bg-slate-100 relative overflow-hidden">
                        @if($agenda->image)
                            <img src="{{ asset('storage/' . $agenda->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-300">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        
                        <!-- Event Date Badge -->
                        <div class="absolute top-4 left-4 bg-blue-600 text-white rounded-2xl p-2.5 shadow-md flex flex-col items-center shrink-0 min-w-[56px] text-center">
                            <span class="text-xs font-bold uppercase tracking-wider">{{ $agenda->event_date->format('M') }}</span>
                            <span class="text-xl font-black leading-none">{{ $agenda->event_date->format('d') }}</span>
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="text-lg font-bold mb-3 text-slate-800 leading-snug group-hover:text-blue-600 transition duration-200">
                            <a href="{{ route('agenda.show', $agenda->slug) }}">{{ $agenda->title }}</a>
                        </h3>
                        
                        <div class="space-y-2 mb-6 text-xs font-semibold text-slate-500">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span>{{ $agenda->location }}</span>
                            </div>
                            @if($agenda->start_time)
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>{{ substr($agenda->start_time, 0, 5) }}@if($agenda->end_time) - {{ substr($agenda->end_time, 0, 5) }}@endif WIB</span>
                                </div>
                            @endif
                        </div>
                        
                        <p class="text-slate-600 text-sm leading-relaxed mb-6 line-clamp-3">
                            {{ strip_tags($agenda->description) }}
                        </p>
                        
                        <div class="mt-auto">
                            <a href="{{ route('agenda.show', $agenda->slug) }}" class="inline-flex items-center gap-1.5 text-blue-600 font-bold text-xs hover:gap-2 transition-all">
                                Selengkapnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 bg-white border border-slate-200 rounded-3xl p-16 text-center text-slate-500 shadow-sm">
                    <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <h3 class="text-lg font-bold text-slate-700">Belum ada agenda kegiatan</h3>
                    <p class="text-sm text-slate-400 mt-1">Jadwal kegiatan atau acara belum ditambahkan oleh admin.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
