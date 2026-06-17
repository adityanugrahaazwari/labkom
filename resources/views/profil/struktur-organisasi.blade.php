@extends('layouts.public')

@section('title', 'Struktur Organisasi - Labkom')

@section('content')
<div class="bg-blue-600 py-16">
    <div class="container mx-auto px-4 lg:px-8">
        <h1 class="text-4xl font-bold text-white mb-4">Struktur Organisasi</h1>
        <p class="text-blue-100 text-lg">Susunan kepengurusan dan manajemen Laboratorium Komputer.</p>
    </div>
</div>

<div class="container mx-auto px-4 lg:px-8 py-16 text-center">
    <div class="max-w-5xl mx-auto">
        <h2 class="text-2xl font-bold mb-12">Struktur Kepengurusan</h2>
        
        <div class="bg-white p-12 rounded-3xl shadow-sm border border-slate-100 min-h-[400px] flex items-center justify-center">
            <div class="text-slate-400">
                <svg class="w-24 h-24 mx-auto mb-4 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                <p class="text-lg">Diagram Struktur Organisasi akan tampil di sini.</p>
                <p class="text-sm">Silakan unggah gambar struktur melalui dashboard admin.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <div class="w-20 h-20 bg-slate-100 rounded-full mx-auto mb-4"></div>
                <h3 class="font-bold text-lg">Kepala Lab</h3>
                <p class="text-blue-600 text-sm font-medium">Manajemen Puncak</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <div class="w-20 h-20 bg-slate-100 rounded-full mx-auto mb-4"></div>
                <h3 class="font-bold text-lg">Sekretaris</h3>
                <p class="text-blue-600 text-sm font-medium">Administrasi</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <div class="w-20 h-20 bg-slate-100 rounded-full mx-auto mb-4"></div>
                <h3 class="font-bold text-lg">Bendahara</h3>
                <p class="text-blue-600 text-sm font-medium">Keuangan</p>
            </div>
        </div>
    </div>
</div>
@endsection
