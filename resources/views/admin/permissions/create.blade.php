@extends('layouts.admin')

@section('title', 'Tambah Hak Akses (Permission)')
@section('subtitle', 'Buat kunci hak akses baru untuk membatasi kontrol halaman, menu, atau fitur.')

@section('content')
<div class="max-w-xl bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
    <form action="{{ route('admin.permissions.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Nama Tampilan -->
        <div class="space-y-2">
            <label for="display_name" class="text-sm font-semibold text-slate-700">Nama Tampilan Permission</label>
            <input 
                type="text" 
                name="display_name" 
                id="display_name" 
                value="{{ old('display_name') }}"
                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm @error('display_name') border-red-500 @enderror"
                placeholder="Contoh: Mengelola User, Melihat Laporan"
                required
            >
            @error('display_name')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Identitas Kode -->
        <div class="space-y-2">
            <label for="name" class="text-sm font-semibold text-slate-700">Kode Identitas (Sistem)</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                value="{{ old('name') }}"
                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-mono @error('name') border-red-500 @enderror"
                placeholder="Contoh: manage-users, view-reports"
                required
            >
            <p class="text-[10px] text-slate-400">Gunakan format lowercase, pisahkan spasi dengan tanda hubung (-).</p>
            @error('name')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Nama Grup -->
        <div class="space-y-2">
            <label for="group_name" class="text-sm font-semibold text-slate-700">Grup Modul</label>
            <input 
                type="text" 
                name="group_name" 
                id="group_name" 
                value="{{ old('group_name') }}"
                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm @error('group_name') border-red-500 @enderror"
                placeholder="Contoh: System Management, Content Management"
                required
            >
            <p class="text-[10px] text-slate-400">Pengelompokan agar mudah dibaca di form pengaturan hak akses peran.</p>
            @error('group_name')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol Aksi -->
        <div class="flex items-center gap-3 pt-6 border-t border-slate-100">
            <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm transition">
                Simpan Hak Akses
            </button>
            <a href="{{ route('admin.permissions.index') }}" class="px-5 py-2.5 border border-slate-200 hover:bg-slate-50 text-slate-700 font-medium rounded-xl text-sm transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
