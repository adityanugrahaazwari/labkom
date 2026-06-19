@extends('layouts.admin')

@section('title', 'Manajemen Berita')
@section('subtitle', 'Tulis, kelola, dan terbitkan artikel berita laboratorium.')

@section('actions')
<a href="{{ route('admin.berita.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl text-sm transition">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
    Tulis Berita
</a>
@endsection

@section('content')
<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 font-semibold">
                    <th class="p-4 w-24">Gambar</th>
                    <th class="p-4">Judul Berita</th>
                    <th class="p-4">Kategori</th>
                    <th class="p-4">Penulis</th>
                    <th class="p-4 w-24 text-center">Dilihat</th>
                    <th class="p-4 w-32">Status</th>
                    <th class="p-4 w-40">Tanggal Dibuat</th>
                    <th class="p-4 w-24 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
                @forelse($news as $item)
                    <tr class="hover:bg-slate-50/55 transition">
                        <td class="p-4">
                            <div class="w-16 h-12 bg-slate-100 border border-slate-200 rounded-lg overflow-hidden flex items-center justify-center text-slate-300">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                @endif
                            </div>
                        </td>
                        <td class="p-4 max-w-xs">
                            <div class="font-bold text-slate-900 truncate" title="{{ $item->title }}">{{ $item->title }}</div>
                            <div class="text-xs text-slate-400 font-mono mt-0.5 truncate">{{ $item->slug }}</div>
                        </td>
                        <td class="p-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 bg-blue-50 text-blue-700 text-xs font-semibold rounded-full border border-blue-100">
                                {{ $item->category->name }}
                            </span>
                        </td>
                        <td class="p-4 text-xs font-semibold text-slate-600">
                            {{ $item->user->name ?? 'Staf Labkom' }}
                        </td>
                        <td class="p-4 text-center font-mono font-bold text-slate-600">
                            {{ number_format($item->views) }}
                        </td>
                        <td class="p-4">
                            @if($item->is_published)
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 bg-emerald-50 text-emerald-700 text-xs font-semibold rounded-full border border-emerald-100">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                                    Published
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 bg-slate-100 text-slate-600 text-xs font-semibold rounded-full border border-slate-200">
                                    <span class="w-1.5 h-1.5 bg-slate-400 rounded-full"></span>
                                    Draft
                                </span>
                            @endif
                        </td>
                        <td class="p-4 text-xs text-slate-500">
                            {{ $item->created_at->format('d M Y, H:i') }}
                        </td>
                        <td class="p-4 text-right space-x-1 whitespace-nowrap">
                            <a href="{{ route('admin.berita.edit', $item) }}" class="inline-flex items-center justify-center p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.berita.destroy', $item) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center justify-center p-2 text-rose-600 hover:bg-rose-50 rounded-lg transition" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="p-8 text-center text-slate-500">
                            Belum ada berita yang ditulis.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
