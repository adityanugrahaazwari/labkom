@extends('layouts.admin')

@section('title', 'Edit Berita')
@section('subtitle', 'Perbarui konten artikel berita yang sudah ada.')

@section('content')
<div class="max-w-4xl bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
    <form action="{{ route('admin.berita.update', $news) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Judul Berita -->
            <div class="space-y-2 md:col-span-2">
                <label for="title" class="text-sm font-semibold text-slate-700">Judul Berita</label>
                <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    value="{{ old('title', $news->title) }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium"
                    required
                >
                @error('title')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kategori Berita -->
            <div class="space-y-2">
                <label for="news_category_id" class="text-sm font-semibold text-slate-700">Kategori / Tipe</label>
                <select 
                    name="news_category_id" 
                    id="news_category_id"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium text-slate-700 bg-white"
                    required
                >
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('news_category_id', $news->news_category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('news_category_id')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Konten Berita -->
            <div class="space-y-2 col-span-3">
                <label for="content" class="text-sm font-semibold text-slate-700">Isi / Konten Berita</label>
                <textarea 
                    name="content" 
                    id="content" 
                    rows="12" 
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium text-slate-700 leading-relaxed"
                    required
                >{{ old('content', $news->content) }}</textarea>
                @error('content')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Featured Image -->
            <div class="space-y-2 col-span-3">
                <label class="text-sm font-semibold text-slate-700 block">Gambar Sampul (Featured Image)</label>
                <div class="flex items-center gap-6 p-4 border border-slate-200 rounded-2xl">
                    <div class="w-20 h-16 bg-slate-50 border border-slate-200 rounded-xl flex items-center justify-center text-slate-300 overflow-hidden shrink-0">
                        @if($news->image)
                            <img src="{{ asset('storage/' . $news->image) }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
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

            <!-- Publish Status -->
            <div class="col-span-3 pt-2">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input 
                        type="checkbox" 
                        name="is_published" 
                        value="1" 
                        class="w-4.5 h-4.5 text-blue-600 rounded border-slate-300 focus:ring-blue-500"
                        {{ old('is_published', $news->is_published) ? 'checked' : '' }}
                    >
                    <div>
                        <span class="text-sm font-semibold text-slate-800">Terbitkan Berita Sekarang</span>
                        <p class="text-[11px] text-slate-400">Jika dicentang, berita akan langsung dapat diakses secara publik.</p>
                    </div>
                </label>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center gap-3 pt-6 border-t border-slate-100">
            <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm transition">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.berita.index') }}" class="px-5 py-2.5 border border-slate-200 hover:bg-slate-50 text-slate-700 font-medium rounded-xl text-sm transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
