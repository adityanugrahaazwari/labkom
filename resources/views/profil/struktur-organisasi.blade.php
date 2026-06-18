@extends('layouts.public')

@section('title', 'Struktur Organisasi - Labkom')

@section('content')
<div class="bg-blue-600 py-16">
    <div class="container mx-auto px-4 lg:px-8">
        <h1 class="text-4xl font-bold text-white mb-4">Struktur Organisasi</h1>
        <p class="text-blue-100 text-lg">Susunan kepengurusan dan manajemen Laboratorium Komputer.</p>
    </div>
</div>

<div class="container mx-auto px-4 lg:px-8 py-16">
    <div class="max-w-6xl mx-auto">
        <!-- Kepala Laboratorium -->
        <div class="mb-20 text-center">
            <h2 class="text-2xl font-bold mb-8 text-slate-800">Kepala Laboratorium</h2>
            <div class="inline-block bg-white p-8 rounded-3xl shadow-sm border border-slate-100 transition-all hover:shadow-md">
                <div class="w-32 h-32 bg-blue-50 rounded-2xl mx-auto mb-6 flex items-center justify-center text-blue-600">
                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <h3 class="font-bold text-xl text-slate-900">Dr. Ir. H. Nama Kepala, M.T.</h3>
                <p class="text-blue-600 font-medium">Kepala Laboratorium</p>
                <div class="mt-4 pt-4 border-t border-slate-50 text-sm text-slate-500">
                    NIP. 19800101 200501 1 001
                </div>
            </div>
        </div>

        <!-- Pranata Komputer Ahli Pertama -->
        <div class="mb-20">
            <h2 class="text-2xl font-bold mb-8 text-center text-slate-800">Pranata Komputer Ahli Pertama</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-3xl mx-auto">
                @for ($i = 1; $i <= 2; $i++)
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-6 transition-all hover:shadow-md">
                    <div class="w-20 h-20 bg-slate-50 rounded-xl flex-shrink-0 flex items-center justify-center text-slate-400">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900">Nama Pranata Ahli {{ $i }}</h3>
                        <p class="text-blue-600 text-sm font-medium">Pranata Komputer Ahli Pertama</p>
                        <p class="text-xs text-slate-500 mt-1">NIP. 19850101 201001 1 00{{ $i }}</p>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <!-- Pranata Komputer Terampil -->
        <div class="mb-20">
            <h2 class="text-2xl font-bold mb-8 text-center text-slate-800">Pranata Komputer Terampil</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @for ($i = 1; $i <= 4; $i++)
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 text-center transition-all hover:shadow-md">
                    <div class="w-16 h-16 bg-slate-50 rounded-full mx-auto mb-4 flex items-center justify-center text-slate-400">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <h3 class="font-bold text-slate-900 text-sm">Nama Pranata Terampil {{ $i }}</h3>
                    <p class="text-blue-600 text-xs font-medium mt-1">Pranata Komputer Terampil</p>
                </div>
                @endfor
            </div>
        </div>

        <!-- Teknisi Laboran -->
        <div>
            <h2 class="text-2xl font-bold mb-8 text-center text-slate-800">Teknisi Laboran</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @for ($i = 1; $i <= 3; $i++)
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col items-center text-center transition-all hover:shadow-md">
                    <div class="w-20 h-20 bg-slate-50 rounded-2xl mb-4 flex items-center justify-center text-slate-400">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <h3 class="font-bold text-slate-900">Nama Teknisi {{ $i }}</h3>
                    <p class="text-blue-600 text-sm font-medium mt-1">Teknisi Laboran</p>
                    <p class="text-xs text-slate-500 mt-2 italic">Spesialis Lab {{ ['Jaringan', 'Multimedia', 'Hardware'][$i-1] }}</p>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection
