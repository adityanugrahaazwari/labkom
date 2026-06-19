@extends('layouts.admin')

@section('title', 'Tambah Anggota Struktur')
@section('subtitle', 'Tambahkan anggota baru ke dalam bagan struktur organisasi.')

@section('content')
<div class="max-w-3xl bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
    <form action="{{ route('admin.struktur-organisasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama Lengkap -->
            <div class="space-y-2 col-span-2">
                <label for="name" class="text-sm font-semibold text-slate-700">Nama Lengkap & Gelar</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    value="{{ old('name') }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium"
                    placeholder="Contoh: Dr. Ir. John Doe, M.T."
                    required
                >
                @error('name')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Jabatan -->
            <div class="space-y-2">
                <label for="position" class="text-sm font-semibold text-slate-700">Jabatan / Peran</label>
                <input 
                    type="text" 
                    name="position" 
                    id="position" 
                    value="{{ old('position') }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium"
                    placeholder="Contoh: Pranata Komputer Ahli Pertama"
                    required
                >
                @error('position')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- NIP -->
            <div class="space-y-2">
                <label for="nip" class="text-sm font-semibold text-slate-700">NIP (Opsional)</label>
                <input 
                    type="text" 
                    name="nip" 
                    id="nip" 
                    value="{{ old('nip') }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium"
                    placeholder="Contoh: 19850101 201001 1 001"
                >
                @error('nip')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Atasan Langsung (Parent Node) -->
            <div class="space-y-2 col-span-2">
                <label for="parent_id" class="text-sm font-semibold text-slate-700">Atasan / Pemimpin Langsung (Konsep Tree)</label>
                <select 
                    name="parent_id" 
                    id="parent_id"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium text-slate-700 bg-white"
                >
                    <option value="">-- Tidak Ada Atasan (Pimpinan Tertinggi / Root) --</option>
                    @foreach($parents as $p)
                        <option value="{{ $p->id }}" {{ old('parent_id') == $p->id ? 'selected' : '' }}>
                            {{ $p->name }} ({{ $p->position }})
                        </option>
                    @endforeach
                </select>
                <p class="text-[11px] text-slate-400">Pilih atasan langsung untuk memetakan anggota ini ke dalam struktur pohon organisasi.</p>
                @error('parent_id')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Spesialisasi -->
            <div class="space-y-2">
                <label for="specialty" class="text-sm font-semibold text-slate-700">Spesialisasi / Keahlian (Opsional)</label>
                <input 
                    type="text" 
                    name="specialty" 
                    id="specialty" 
                    value="{{ old('specialty') }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium"
                    placeholder="Contoh: Jaringan, Multimedia, Hardware"
                >
                @error('specialty')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Urutan -->
            <div class="space-y-2">
                <label for="order" class="text-sm font-semibold text-slate-700">Nomor Urut Tampil (Sibling Order)</label>
                <input 
                    type="number" 
                    name="order" 
                    id="order" 
                    value="{{ old('order', 1) }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium"
                    min="0"
                    required
                >
                <p class="text-[11px] text-slate-400">Digunakan untuk mengurutkan anggota dengan tingkat/atasan yang sama.</p>
                @error('order')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Avatar -->
            <div class="space-y-2 col-span-2">
                <label class="text-sm font-semibold text-slate-700 block">Foto Profil (Avatar)</label>
                <div class="flex items-center gap-6 p-4 border border-slate-200 rounded-2xl">
                    <div class="w-16 h-16 bg-slate-50 border border-slate-200 rounded-xl flex items-center justify-center text-slate-300 overflow-hidden">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <div class="space-y-1">
                        <input type="file" name="avatar" class="text-xs text-slate-500">
                        <p class="text-[10px] text-slate-400">Format JPEG/PNG/JPG. Maksimal 2MB.</p>
                    </div>
                </div>
                @error('avatar')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center gap-3 pt-6 border-t border-slate-100">
            <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm transition">
                Simpan Anggota
            </button>
            <a href="{{ route('admin.struktur-organisasi.index') }}" class="px-5 py-2.5 border border-slate-200 hover:bg-slate-50 text-slate-700 font-medium rounded-xl text-sm transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
