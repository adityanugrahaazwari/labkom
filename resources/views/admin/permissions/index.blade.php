@extends('layouts.admin')

@section('title', 'Manajemen Hak Akses (Permission)')
@section('subtitle', 'Daftar hak akses sistem untuk membatasi kontrol navigasi dan modul.')

@section('actions')
    <a href="{{ route('admin.permissions.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Hak Akses
    </a>
@endsection

@section('content')
<div class="space-y-6">
    @forelse($permissions as $group => $perms)
        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
            <div class="bg-slate-50 border-b border-slate-200 px-6 py-4">
                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500">{{ $group }}</h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-100 text-xs font-semibold text-slate-400 uppercase">
                            <th class="py-3 px-6">Nama Tampilan</th>
                            <th class="py-3 px-6">Identitas Kode (System Key)</th>
                            <th class="py-3 px-6 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                        @foreach($perms as $perm)
                            <tr class="hover:bg-slate-50/30 transition">
                                <td class="py-3.5 px-6 font-semibold text-slate-900">{{ $perm->display_name }}</td>
                                <td class="py-3.5 px-6 font-mono text-xs text-slate-500">{{ $perm->name }}</td>
                                <td class="py-3.5 px-6 text-right">
                                    <form action="{{ route('admin.permissions.destroy', $perm->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus hak akses ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 hover:bg-slate-100 rounded text-slate-500 hover:text-red-600 transition" title="Hapus Hak Akses">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @empty
        <div class="bg-white border border-slate-200 rounded-2xl p-8 text-center text-slate-400">
            Belum ada data hak akses (permissions).
        </div>
    @endforelse
</div>
@endsection
