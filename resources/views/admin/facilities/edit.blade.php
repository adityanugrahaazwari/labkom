@extends('layouts.admin')

@section('title', 'Edit Laboratorium')
@section('subtitle', 'Perbarui detail informasi fasilitas laboratorium.')

@section('content')
<div class="max-w-4xl bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
    <form action="{{ route('admin.facilities.update', $facility->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama Laboratorium -->
            <div class="space-y-2 col-span-2">
                <label for="name" class="text-sm font-semibold text-slate-700">Nama Laboratorium</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    value="{{ old('name', $facility->name) }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium"
                    required
                >
                @error('name')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kepala Lab -->
            <div class="space-y-2">
                <label for="head_of_lab" class="text-sm font-semibold text-slate-700">Kepala / Penanggung Jawab</label>
                <input 
                    type="text" 
                    name="head_of_lab" 
                    id="head_of_lab" 
                    value="{{ old('head_of_lab', $facility->head_of_lab) }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium"
                >
                @error('head_of_lab')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Lokasi Ruang -->
            <div class="space-y-2">
                <label for="location" class="text-sm font-semibold text-slate-700">Lokasi Ruangan</label>
                <input 
                    type="text" 
                    name="location" 
                    id="location" 
                    value="{{ old('location', $facility->location) }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium"
                >
                @error('location')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi Laboratorium -->
            <div class="space-y-2 col-span-2">
                <label for="description" class="text-sm font-semibold text-slate-700">Deskripsi / Detail Laboratorium</label>
                <textarea 
                    name="description" 
                    id="description" 
                    rows="6" 
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium text-slate-700 leading-relaxed"
                    required
                >{{ old('description', $facility->description) }}</textarea>
                @error('description')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Cover Image -->
            <div class="space-y-2 col-span-2">
                <label class="text-sm font-semibold text-slate-700 block">Foto / Gambar Laboratorium</label>
                <div class="flex items-center gap-6 p-4 border border-slate-200 rounded-2xl">
                    <div class="w-20 h-16 bg-slate-50 border border-slate-200 rounded-xl flex items-center justify-center text-slate-300 overflow-hidden shrink-0">
                        @if($facility->image)
                            <img src="{{ asset('storage/' . $facility->image) }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        @endif
                    </div>
                    <div class="space-y-1">
                        <input type="file" name="image" class="text-xs text-slate-500">
                        <p class="text-[10px] text-slate-400">Pilih file baru jika ingin mengganti gambar. Format JPEG/PNG/JPG. Maksimal 2MB.</p>
                    </div>
                </div>
                @error('image')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status Aktif -->
            <div class="col-span-2 pt-2">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input 
                        type="checkbox" 
                        name="status" 
                        value="1" 
                        class="w-4.5 h-4.5 text-blue-600 rounded border-slate-300 focus:ring-blue-500"
                        {{ old('status', $facility->status) ? 'checked' : '' }}
                    >
                    <div>
                        <span class="text-sm font-semibold text-slate-800">Aktifkan Laboratorium</span>
                        <p class="text-[11px] text-slate-400">Jika dicentang, laboratorium ini akan ditampilkan secara publik di menu fasilitas.</p>
                    </div>
                </label>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center gap-3 pt-6 border-t border-slate-100">
            <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm transition">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.facilities.index') }}" class="px-5 py-2.5 border border-slate-200 hover:bg-slate-50 text-slate-700 font-medium rounded-xl text-sm transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
