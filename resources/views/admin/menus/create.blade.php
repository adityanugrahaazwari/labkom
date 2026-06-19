@extends('layouts.admin')

@section('title', 'Tambah Menu')
@section('subtitle', 'Buat item navigasi baru untuk website publik atau panel admin.')

@section('content')
<div class="max-w-3xl bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
    <form action="{{ route('admin.menus.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Label Menu -->
            <div class="space-y-2 col-span-2 md:col-span-1">
                <label for="name" class="text-sm font-semibold text-slate-700">Label Menu</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    value="{{ old('name') }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm @error('name') border-red-500 @enderror"
                    placeholder="Contoh: Berita, Profil Lab"
                    required
                >
                @error('name')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Posisi Menu -->
            <div class="space-y-2 col-span-2 md:col-span-1">
                <label for="position" class="text-sm font-semibold text-slate-700">Posisi Menu</label>
                <select 
                    name="position" 
                    id="position" 
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm @error('position') border-red-500 @enderror"
                    required
                >
                    <option value="header" {{ old('position') === 'header' ? 'selected' : '' }}>Header Navigation (Publik)</option>
                    <option value="sidebar" {{ old('position') === 'sidebar' ? 'selected' : '' }}>Sidebar Navigation (Admin)</option>
                </select>
                @error('position')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Parent Menu -->
            <div class="space-y-2 col-span-2 md:col-span-1">
                <label for="parent_id" class="text-sm font-semibold text-slate-700">Parent Menu (Induk)</label>
                <select 
                    name="parent_id" 
                    id="parent_id" 
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm @error('parent_id') border-red-500 @enderror"
                >
                    <option value="">-- Tanpa Induk (Menu Utama) --</option>
                    @foreach($parentOptions as $parent)
                        <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                            [{{ strtoupper($parent->position) }}] {{ $parent->name }}
                        </option>
                    @endforeach
                </select>
                <p class="text-[10px] text-slate-400">Pilih menu induk jika item ini ingin dijadikan sub-menu.</p>
                @error('parent_id')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Urutan (Order) -->
            <div class="space-y-2 col-span-2 md:col-span-1">
                <label for="order" class="text-sm font-semibold text-slate-700">Urutan (Order)</label>
                <input 
                    type="number" 
                    name="order" 
                    id="order" 
                    value="{{ old('order', 0) }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm @error('order') border-red-500 @enderror"
                    placeholder="Contoh: 1, 2, 3"
                    required
                >
                @error('order')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Path / URL -->
            <div class="space-y-2 col-span-2 md:col-span-1">
                <label for="url" class="text-sm font-semibold text-slate-700">Path / URL Tujuan</label>
                <input 
                    type="text" 
                    name="url" 
                    id="url" 
                    value="{{ old('url') }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm @error('url') border-red-500 @enderror"
                    placeholder="Contoh: /berita, #, atau URL eksternal"
                >
                @error('url')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Route Name -->
            <div class="space-y-2 col-span-2 md:col-span-1">
                <label for="route_name" class="text-sm font-semibold text-slate-700">Laravel Route Name</label>
                <input 
                    type="text" 
                    name="route_name" 
                    id="route_name" 
                    value="{{ old('route_name') }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-mono @error('route_name') border-red-500 @enderror"
                    placeholder="Contoh: berita.index"
                >
                @error('route_name')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Icon Class -->
            <div class="space-y-2 col-span-2 md:col-span-1">
                <label for="icon" class="text-sm font-semibold text-slate-700">Icon Class (Sidebar)</label>
                <input 
                    type="text" 
                    name="icon" 
                    id="icon" 
                    value="{{ old('icon') }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-mono @error('icon') border-red-500 @enderror"
                    placeholder="Contoh: cog, users, newspaper"
                >
                @error('icon')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Target Pembukaan -->
            <div class="space-y-2 col-span-2 md:col-span-1">
                <label for="target" class="text-sm font-semibold text-slate-700">Target Link</label>
                <select 
                    name="target" 
                    id="target" 
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                    required
                >
                    <option value="_self" {{ old('target') === '_self' ? 'selected' : '' }}>Buka di Tab yang Sama (_self)</option>
                    <option value="_blank" {{ old('target') === '_blank' ? 'selected' : '' }}>Buka di Tab Baru (_blank)</option>
                </select>
            </div>

            <!-- Pembatasan Hak Akses (Permission Restriction) -->
            <div class="space-y-2 col-span-2">
                <label for="permission_id" class="text-sm font-semibold text-slate-700">Batasi Berdasarkan Hak Akses (Permission)</label>
                <select 
                    name="permission_id" 
                    id="permission_id" 
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm @error('permission_id') border-red-500 @enderror"
                >
                    <option value="">-- Tampilkan untuk Semua Pengguna (Publik) --</option>
                    @foreach($permissions as $perm)
                        <option value="{{ $perm->id }}" {{ old('permission_id') == $perm->id ? 'selected' : '' }}>
                            [{{ $perm->group_name }}] {{ $perm->display_name }} ({{ $perm->name }})
                        </option>
                    @endforeach
                </select>
                <p class="text-[10px] text-slate-400">Jika dipilih, menu ini hanya akan muncul untuk pengguna yang memiliki hak akses tersebut.</p>
                @error('permission_id')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status Aktif -->
            <div class="col-span-2 pt-2">
                <label class="inline-flex items-center gap-2 cursor-pointer">
                    <input 
                        type="checkbox" 
                        name="is_active" 
                        value="1" 
                        class="w-4 h-4 rounded text-blue-600 border-slate-300 focus:ring-blue-500" 
                        {{ old('is_active', '1') === '1' ? 'checked' : '' }}
                    >
                    <span class="text-sm font-semibold text-slate-700">Aktifkan Menu (Tampilkan di Navigasi)</span>
                </label>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex items-center gap-3 pt-6 border-t border-slate-100">
            <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm transition">
                Simpan Menu
            </button>
            <a href="{{ route('admin.menus.index') }}" class="px-5 py-2.5 border border-slate-200 hover:bg-slate-50 text-slate-700 font-medium rounded-xl text-sm transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
