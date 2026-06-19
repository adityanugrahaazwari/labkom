@extends('layouts.admin')

@section('title', 'Tambah Pengguna')
@section('subtitle', 'Buat akun pengguna baru dan tetapkan peran akses mereka.')

@section('content')
<div class="max-w-3xl bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama -->
            <div class="space-y-2 col-span-2">
                <label for="name" class="text-sm font-semibold text-slate-700">Nama Lengkap</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    value="{{ old('name') }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm @error('name') border-red-500 @enderror"
                    placeholder="Masukkan nama lengkap"
                    required
                >
                @error('name')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="space-y-2 col-span-2">
                <label for="email" class="text-sm font-semibold text-slate-700">Alamat Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    value="{{ old('email') }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm @error('email') border-red-500 @enderror"
                    placeholder="nama@domain.com"
                    required
                >
                @error('email')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <label for="password" class="text-sm font-semibold text-slate-700">Kata Sandi</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm @error('password') border-red-500 @enderror"
                    placeholder="Minimal 8 karakter"
                    required
                >
                @error('password')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Confirmation -->
            <div class="space-y-2">
                <label for="password_confirmation" class="text-sm font-semibold text-slate-700">Konfirmasi Kata Sandi</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    id="password_confirmation" 
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                    placeholder="Ulangi kata sandi"
                    required
                >
            </div>
        </div>

        <!-- Peran (Roles) -->
        <div class="space-y-3 pt-4 border-t border-slate-100">
            <span class="text-sm font-semibold text-slate-700 block">Pilih Peran (Roles)</span>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($roles as $role)
                    <label class="flex items-start gap-3 p-4 rounded-xl border border-slate-200 hover:bg-slate-50 cursor-pointer transition">
                        <input 
                            type="checkbox" 
                            name="roles[]" 
                            value="{{ $role->id }}" 
                            class="mt-1 w-4 h-4 rounded text-blue-600 border-slate-300 focus:ring-blue-500"
                            {{ is_array(old('roles')) && in_array($role->id, old('roles')) ? 'checked' : '' }}
                        >
                        <div>
                            <span class="text-sm font-bold text-slate-900 block">{{ $role->display_name }}</span>
                            <span class="text-xs text-slate-500">{{ $role->description }}</span>
                        </div>
                    </label>
                @endforeach
            </div>
            @error('roles')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol Aksi -->
        <div class="flex items-center gap-3 pt-6 border-t border-slate-100">
            <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm transition">
                Simpan Pengguna
            </button>
            <a href="{{ route('admin.users.index') }}" class="px-5 py-2.5 border border-slate-200 hover:bg-slate-50 text-slate-700 font-medium rounded-xl text-sm transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
