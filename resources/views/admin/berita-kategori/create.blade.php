@extends('layouts.admin')

@section('title', 'Tambah Kategori Berita')
@section('subtitle', 'Buat kategori baru untuk mengelompokkan berita.')

@section('content')
<div class="max-w-xl bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
    <form action="{{ route('admin.berita-kategori.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="space-y-2">
            <label for="name" class="text-sm font-semibold text-slate-700">Nama Kategori</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                value="{{ old('name') }}"
                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium"
                placeholder="Contoh: Pengumuman, Agenda, Berita Utama"
                required
                autofocus
            >
            @error('name')
                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-3 pt-6 border-t border-slate-100">
            <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm transition">
                Simpan Kategori
            </button>
            <a href="{{ route('admin.berita-kategori.index') }}" class="px-5 py-2.5 border border-slate-200 hover:bg-slate-50 text-slate-700 font-medium rounded-xl text-sm transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
