@extends('layouts.admin')

@section('title', 'Tambah FAQ')
@section('subtitle', 'Buat FAQ baru untuk dipublikasikan di website.')

@section('content')
<div class="max-w-3xl bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
    <form action="{{ route('admin.faq.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Pertanyaan -->
        <div class="space-y-2">
            <label for="question" class="text-sm font-semibold text-slate-700">Pertanyaan</label>
            <input 
                type="text" 
                name="question" 
                id="question" 
                value="{{ old('question') }}"
                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium"
                placeholder="Contoh: Bagaimana cara mendaftar akun praktikum?"
                required
            >
            @error('question')
                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Jawaban -->
        <div class="space-y-2">
            <label for="answer" class="text-sm font-semibold text-slate-700">Jawaban</label>
            <textarea 
                name="answer" 
                id="answer" 
                rows="6" 
                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium text-slate-700 leading-relaxed"
                placeholder="Tulis penjelasan lengkap jawaban di sini..."
                required
            >{{ old('answer') }}</textarea>
            @error('answer')
                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Urutan Tampil -->
        <div class="space-y-2 max-w-xs">
            <label for="order" class="text-sm font-semibold text-slate-700">Nomor Urutan</label>
            <input 
                type="number" 
                name="order" 
                id="order" 
                value="{{ old('order', 1) }}"
                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium"
                min="0"
                required
            >
            <p class="text-[10px] text-slate-400">Menentukan urutan tampilan FAQ (angka lebih kecil muncul lebih dahulu).</p>
            @error('order')
                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status Aktif -->
        <div class="pt-2">
            <label class="flex items-center gap-3 cursor-pointer">
                <input 
                    type="checkbox" 
                    name="is_active" 
                    value="1" 
                    class="w-4.5 h-4.5 text-blue-600 rounded border-slate-300 focus:ring-blue-500"
                    {{ old('is_active', 1) ? 'checked' : '' }}
                >
                <div>
                    <span class="text-sm font-semibold text-slate-800">Aktifkan FAQ</span>
                    <p class="text-[11px] text-slate-400">Jika dicentang, FAQ ini akan langsung ditampilkan secara publik.</p>
                </div>
            </label>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center gap-3 pt-6 border-t border-slate-100">
            <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm transition">
                Simpan FAQ
            </button>
            <a href="{{ route('admin.faq.index') }}" class="px-5 py-2.5 border border-slate-200 hover:bg-slate-50 text-slate-700 font-medium rounded-xl text-sm transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
