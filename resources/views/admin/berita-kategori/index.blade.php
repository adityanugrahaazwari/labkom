@extends('layouts.admin')

@section('title', 'Kategori / Tipe Berita')
@section('subtitle', 'Kelola kategori dan pengelompokan artikel berita.')

@section('actions')
<a href="{{ route('admin.berita-kategori.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl text-sm transition">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
    Tambah Kategori
</a>
@endsection

@section('content')
<div class="max-w-4xl bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 font-semibold">
                    <th class="p-4 w-20">ID</th>
                    <th class="p-4">Nama Kategori</th>
                    <th class="p-4">Slug (URL)</th>
                    <th class="p-4 w-32 text-center">Jumlah Berita</th>
                    <th class="p-4 w-28 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
                @forelse($categories as $category)
                    <tr class="hover:bg-slate-50/55 transition">
                        <td class="p-4 font-mono text-xs text-slate-500">#{{ $category->id }}</td>
                        <td class="p-4 font-bold text-slate-900">{{ $category->name }}</td>
                        <td class="p-4 font-mono text-xs text-slate-400">{{ $category->slug }}</td>
                        <td class="p-4 text-center">
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-50 text-blue-600 text-xs font-bold border border-blue-100">
                                {{ $category->news_count }}
                            </span>
                        </td>
                        <td class="p-4 text-right space-x-1 whitespace-nowrap">
                            <a href="{{ route('admin.berita-kategori.edit', $category) }}" class="inline-flex items-center justify-center p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.berita-kategori.destroy', $category) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center justify-center p-2 text-rose-600 hover:bg-rose-50 rounded-lg transition" title="Hapus" @if($category->news_count > 0) disabled title="Kategori masih memiliki berita" class="text-slate-300 cursor-not-allowed" @endif>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-8 text-center text-slate-500">
                            Belum ada kategori berita yang terdaftar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
