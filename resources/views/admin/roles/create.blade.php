@extends('layouts.admin')

@section('title', 'Tambah Peran (Role)')
@section('subtitle', 'Buat kelompok hak akses baru untuk staf.')

@section('content')
<div class="max-w-4xl bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
    <form action="{{ route('admin.roles.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama Peran -->
            <div class="space-y-2">
                <label for="display_name" class="text-sm font-semibold text-slate-700">Nama Peran</label>
                <input 
                    type="text" 
                    name="display_name" 
                    id="display_name" 
                    value="{{ old('display_name') }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm @error('display_name') border-red-500 @enderror"
                    placeholder="Contoh: Kepala Laboratorium"
                    required
                >
                @error('display_name')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Key Code -->
            <div class="space-y-2">
                <label for="name" class="text-sm font-semibold text-slate-700">Key Code (Sistem)</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    value="{{ old('name') }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-mono @error('name') border-red-500 @enderror"
                    placeholder="Contoh: kepala-lab"
                    required
                >
                @error('name')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div class="space-y-2 col-span-2">
                <label for="description" class="text-sm font-semibold text-slate-700">Deskripsi Peran</label>
                <textarea 
                    name="description" 
                    id="description" 
                    rows="3"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm @error('description') border-red-500 @enderror"
                    placeholder="Jelaskan ruang lingkup peran ini..."
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Otorisasi Hak Akses (Permissions) -->
        <div class="space-y-4 pt-6 border-t border-slate-100">
            <div>
                <h3 class="text-sm font-bold text-slate-900">Otorisasi Hak Akses (Permissions)</h3>
                <p class="text-xs text-slate-400 mt-1">Centang hak akses yang ingin diberikan pada peran ini.</p>
            </div>

            <div class="space-y-6">
                @foreach($permissions as $group => $perms)
                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">{{ $group }}</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($perms as $perm)
                                <label class="flex items-center gap-3 p-3 bg-white border border-slate-200 rounded-xl hover:bg-blue-50/20 cursor-pointer transition">
                                    <input 
                                        type="checkbox" 
                                        name="permissions[]" 
                                        value="{{ $perm->id }}" 
                                        class="w-4 h-4 rounded text-blue-600 border-slate-300 focus:ring-blue-500"
                                        {{ is_array(old('permissions')) && in_array($perm->id, old('permissions')) ? 'checked' : '' }}
                                    >
                                    <div class="text-xs">
                                        <span class="font-bold text-slate-900 block">{{ $perm->display_name }}</span>
                                        <span class="text-slate-400 font-mono text-[10px]">{{ $perm->name }}</span>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex items-center gap-3 pt-6 border-t border-slate-100">
            <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm transition">
                Simpan Peran
            </button>
            <a href="{{ route('admin.roles.index') }}" class="px-5 py-2.5 border border-slate-200 hover:bg-slate-50 text-slate-700 font-medium rounded-xl text-sm transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
