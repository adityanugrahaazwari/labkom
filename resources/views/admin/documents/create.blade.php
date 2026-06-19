@extends('layouts.admin')

@section('title', 'Unggah Dokumen Baru')
@section('subtitle', 'Tambahkan dokumen baru yang dapat diunduh pengguna.')

@section('content')
<div class="max-w-2xl bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
    <form action="{{ route('admin.documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Judul Dokumen -->
        <div class="space-y-2">
            <label for="title" class="text-sm font-semibold text-slate-700">Nama / Judul Dokumen</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                value="{{ old('title') }}"
                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium"
                placeholder="Contoh: Formulir Pendaftaran Laboratorium, Buku Panduan"
                required
            >
            @error('title')
                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Deskripsi Dokumen -->
        <div class="space-y-2">
            <label for="description" class="text-sm font-semibold text-slate-700">Deskripsi Singkat (Opsional)</label>
            <textarea 
                name="description" 
                id="description" 
                rows="3" 
                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium text-slate-700"
                placeholder="Jelaskan isi atau fungsi dokumen ini..."
            >{{ old('description') }}</textarea>
            @error('description')
                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- File Upload -->
        <div class="space-y-2">
            <label class="text-sm font-semibold text-slate-700 block">Pilih File Dokumen</label>
            <div class="flex items-center gap-6 p-4 border border-slate-200 rounded-2xl">
                <div class="w-14 h-14 bg-slate-50 border border-slate-200 rounded-xl flex items-center justify-center text-slate-300 overflow-hidden shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <div class="space-y-1">
                    <input type="file" name="file" class="text-xs text-slate-500" required>
                    <p class="text-[10px] text-slate-400">Format yang didukung: PDF, DOC, DOCX, XLS, XLSX, ZIP. Maksimal 10MB.</p>
                </div>
            </div>
            @error('file')
                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center gap-3 pt-6 border-t border-slate-100">
            <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm transition">
                Mulai Unggah
            </button>
            <a href="{{ route('admin.documents.index') }}" class="px-5 py-2.5 border border-slate-200 hover:bg-slate-50 text-slate-700 font-medium rounded-xl text-sm transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
