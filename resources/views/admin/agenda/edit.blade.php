@extends('layouts.admin')

@section('title', 'Edit Agenda')
@section('subtitle', 'Perbarui detail agenda kegiatan.')

@section('content')
<div class="max-w-4xl bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
    <form action="{{ route('admin.agenda.update', $agenda) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Judul Agenda -->
            <div class="space-y-2 col-span-2">
                <label for="title" class="text-sm font-semibold text-slate-700">Nama / Judul Kegiatan</label>
                <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    value="{{ old('title', $agenda->title) }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium"
                    required
                >
                @error('title')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Lokasi Kegiatan -->
            <div class="space-y-2">
                <label for="location" class="text-sm font-semibold text-slate-700">Lokasi Pelaksanaan</label>
                <input 
                    type="text" 
                    name="location" 
                    id="location" 
                    value="{{ old('location', $agenda->location) }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium"
                    required
                >
                @error('location')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tanggal Kegiatan -->
            <div class="space-y-2">
                <label for="event_date" class="text-sm font-semibold text-slate-700">Tanggal Pelaksanaan</label>
                <input 
                    type="date" 
                    name="event_date" 
                    id="event_date" 
                    value="{{ old('event_date', $agenda->event_date->format('Y-m-d')) }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium text-slate-700 bg-white"
                    required
                >
                @error('event_date')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Jam Mulai -->
            <div class="space-y-2">
                <label for="start_time" class="text-sm font-semibold text-slate-700">Waktu Mulai (Opsional)</label>
                <input 
                    type="time" 
                    name="start_time" 
                    id="start_time" 
                    value="{{ old('start_time', $agenda->start_time) }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium text-slate-700 bg-white"
                >
                @error('start_time')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Jam Selesai -->
            <div class="space-y-2">
                <label for="end_time" class="text-sm font-semibold text-slate-700">Waktu Selesai (Opsional)</label>
                <input 
                    type="time" 
                    name="end_time" 
                    id="end_time" 
                    value="{{ old('end_time', $agenda->end_time) }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium text-slate-700 bg-white"
                >
                @error('end_time')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi Detail Kegiatan -->
            <div class="space-y-2 col-span-2">
                <label for="description" class="text-sm font-semibold text-slate-700">Rincian Kegiatan</label>
                <textarea 
                    name="description" 
                    id="description" 
                    rows="6" 
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium text-slate-700 leading-relaxed"
                    required
                >{{ old('description', $agenda->description) }}</textarea>
                @error('description')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image Banner -->
            <div class="space-y-2 col-span-2">
                <label class="text-sm font-semibold text-slate-700 block">Poster / Gambar Agenda</label>
                <div class="flex items-center gap-6 p-4 border border-slate-200 rounded-2xl">
                    <div class="w-20 h-16 bg-slate-50 border border-slate-200 rounded-xl flex items-center justify-center text-slate-300 overflow-hidden shrink-0">
                        @if($agenda->image)
                            <img src="{{ asset('storage/' . $agenda->image) }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        @endif
                    </div>
                    <div class="space-y-1">
                        <input type="file" name="image" class="text-xs text-slate-500">
                        <p class="text-[10px] text-slate-400">Pilih file baru jika ingin mengganti poster. Format JPEG/PNG/JPG. Maksimal 2MB.</p>
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
                        {{ old('status', $agenda->status) ? 'checked' : '' }}
                    >
                    <div>
                        <span class="text-sm font-semibold text-slate-800">Aktifkan Agenda</span>
                        <p class="text-[11px] text-slate-400">Jika dicentang, agenda ini akan ditampilkan secara publik.</p>
                    </div>
                </label>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center gap-3 pt-6 border-t border-slate-100">
            <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm transition">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.agenda.index') }}" class="px-5 py-2.5 border border-slate-200 hover:bg-slate-50 text-slate-700 font-medium rounded-xl text-sm transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
