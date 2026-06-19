@extends('layouts.admin')

@section('title', 'Manajemen Agenda Kegiatan')
@section('subtitle', 'Kelola jadwal acara, workshop, seminar, and agenda penting di Laboratorium.')

@section('actions')
<a href="{{ route('admin.agenda.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl text-sm transition">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
    Tambah Agenda
</a>
@endsection

@section('content')
<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 font-semibold">
                    <th class="p-4 w-24">Banner</th>
                    <th class="p-4">Nama Agenda / Kegiatan</th>
                    <th class="p-4">Tanggal Pelaksanaan</th>
                    <th class="p-4">Waktu</th>
                    <th class="p-4">Lokasi Ruang</th>
                    <th class="p-4 w-32 text-center">Status</th>
                    <th class="p-4 w-24 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
                @forelse($agendas as $agenda)
                    <tr class="hover:bg-slate-50/55 transition">
                        <td class="p-4">
                            <div class="w-16 h-12 bg-slate-100 border border-slate-200 rounded-lg overflow-hidden flex items-center justify-center text-slate-300">
                                @if($agenda->image)
                                    <img src="{{ asset('storage/' . $agenda->image) }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                @endif
                            </div>
                        </td>
                        <td class="p-4 max-w-xs">
                            <div class="font-bold text-slate-900 truncate" title="{{ $agenda->title }}">{{ $agenda->title }}</div>
                            <div class="text-xs text-slate-400 font-mono mt-0.5 truncate">{{ $agenda->slug }}</div>
                        </td>
                        <td class="p-4 font-semibold text-slate-700">
                            {{ $agenda->event_date->format('d M Y') }}
                        </td>
                        <td class="p-4 text-xs font-mono text-slate-500">
                            @if($agenda->start_time)
                                {{ substr($agenda->start_time, 0, 5) }}@if($agenda->end_time) - {{ substr($agenda->end_time, 0, 5) }}@endif WIB
                            @else
                                -
                            @endif
                        </td>
                        <td class="p-4 font-medium text-slate-600">
                            {{ $agenda->location }}
                        </td>
                        <td class="p-4 text-center">
                            @if($agenda->status)
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 bg-emerald-50 text-emerald-700 text-xs font-semibold rounded-full border border-emerald-100">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 bg-rose-50 text-rose-700 text-xs font-semibold rounded-full border border-rose-100">
                                    <span class="w-1.5 h-1.5 bg-rose-500 rounded-full"></span>
                                    Nonaktif
                                </span>
                            @endif
                        </td>
                        <td class="p-4 text-right space-x-1 whitespace-nowrap">
                            <a href="{{ route('admin.agenda.edit', $agenda) }}" class="inline-flex items-center justify-center p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.agenda.destroy', $agenda) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus agenda kegiatan ini beserta gambarnya?')" class="inline">
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
                        <td colspan="7" class="p-8 text-center text-slate-500">
                            Belum ada agenda kegiatan yang terdaftar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
