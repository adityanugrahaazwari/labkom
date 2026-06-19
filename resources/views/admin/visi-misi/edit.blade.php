@extends('layouts.admin')

@section('title', 'Manajemen Visi & Misi')
@section('subtitle', 'Kelola visi dan misi utama yang dipublikasikan di website.')

@section('content')
<div class="max-w-4xl bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
    <form action="{{ route('admin.visi-misi.update') }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Vision Section -->
        <div class="space-y-3">
            <label for="visi" class="text-sm font-bold text-slate-900 block">Pernyataan Visi</label>
            <p class="text-xs text-slate-500">Pernyataan visi utama dari Laboratorium Komputer.</p>
            <textarea 
                name="visi" 
                id="visi" 
                rows="4" 
                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium text-slate-700 leading-relaxed italic"
                placeholder="Masukkan visi..."
                required
            >{{ old('visi', $visiMisi->visi) }}</textarea>
            @error('visi')
                <p class="text-xs text-rose-500">{{ $message }}</p>
            @enderror
        </div>

        <hr class="border-slate-100">

        <!-- Mission Section with Alpine.js -->
        <div x-data="{ 
            items: {{ json_encode(old('misi', $visiMisi->misi ?? [''])) }},
            addItem() {
                this.items.push('');
            },
            removeItem(index) {
                if (this.items.length > 1) {
                    this.items.splice(index, 1);
                } else {
                    this.items[0] = '';
                }
            }
        }" class="space-y-4">
            <div>
                <label class="text-sm font-bold text-slate-900 block">Pernyataan Misi</label>
                <p class="text-xs text-slate-500 mb-2">Daftar misi utama. Anda dapat menambah, menghapus, atau mengurutkan isi misi di bawah.</p>
            </div>

            <div class="space-y-3">
                <template x-for="(item, index) in items" :key="index">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center font-bold text-sm shrink-0" x-text="index + 1"></div>
                        <input 
                            type="text" 
                            name="misi[]" 
                            x-model="items[index]"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm font-medium text-slate-700"
                            placeholder="Masukkan poin misi..."
                            required
                        >
                        <button 
                            type="button" 
                            @click="removeItem(index)" 
                            class="p-2.5 text-rose-500 hover:bg-rose-50 rounded-xl transition shrink-0"
                            title="Hapus Misi"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                </template>
            </div>

            @error('misi')
                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
            @enderror

            <div class="pt-2">
                <button 
                    type="button" 
                    @click="addItem" 
                    class="inline-flex items-center gap-2 px-4 py-2.5 border border-slate-200 hover:bg-slate-50 text-slate-700 font-semibold rounded-xl text-xs transition"
                >
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah Poin Misi
                </button>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center gap-3 pt-6 border-t border-slate-100">
            <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm transition">
                Simpan Perubahan
            </button>
            <button type="button" @click="location.reload()" class="px-5 py-2.5 border border-slate-200 hover:bg-slate-50 text-slate-700 font-medium rounded-xl text-sm transition">
                Reset
            </button>
        </div>
    </form>
</div>
@endsection
