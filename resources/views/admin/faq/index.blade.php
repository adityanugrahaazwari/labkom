@extends('layouts.admin')

@section('title', 'Manajemen FAQ')
@section('subtitle', 'Kelola daftar Pertanyaan yang Sering Diajukan (FAQ) di website.')

@section('actions')
<a href="{{ route('admin.faq.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl text-sm transition">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
    Tambah FAQ
</a>
@endsection

@section('content')
<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 font-semibold">
                    <th class="p-4 w-20 text-center">Urutan</th>
                    <th class="p-4">Pertanyaan</th>
                    <th class="p-4">Jawaban</th>
                    <th class="p-4 w-32 text-center">Status</th>
                    <th class="p-4 w-24 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
                @forelse($faqs as $faq)
                    <tr class="hover:bg-slate-50/55 transition">
                        <td class="p-4 text-center">
                            <span class="font-mono text-slate-600 font-bold bg-slate-50 px-2.5 py-1 border border-slate-100 rounded text-xs">
                                {{ $faq->order }}
                            </span>
                        </td>
                        <td class="p-4 font-bold text-slate-900 max-w-xs truncate" title="{{ $faq->question }}">
                            {{ $faq->question }}
                        </td>
                        <td class="p-4 text-slate-600 max-w-sm truncate" title="{{ strip_tags($faq->answer) }}">
                            {{ strip_tags($faq->answer) }}
                        </td>
                        <td class="p-4 text-center">
                            @if($faq->is_active)
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 bg-emerald-50 text-emerald-700 text-xs font-semibold rounded-full border border-emerald-100">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 bg-slate-100 text-slate-500 text-xs font-semibold rounded-full border border-slate-200">
                                    <span class="w-1.5 h-1.5 bg-slate-400 rounded-full"></span>
                                    Nonaktif
                                </span>
                            @endif
                        </td>
                        <td class="p-4 text-right space-x-1 whitespace-nowrap">
                            <a href="{{ route('admin.faq.edit', $faq) }}" class="inline-flex items-center justify-center p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.faq.destroy', $faq) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus FAQ ini?')" class="inline">
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
                        <td colspan="5" class="p-8 text-center text-slate-500">
                            Belum ada FAQ yang dibuat.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
