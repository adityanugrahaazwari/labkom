@extends('layouts.admin')

@section('title', 'Struktur Organisasi')
@section('subtitle', 'Kelola struktur kepengurusan Laboratorium Komputer dengan konsep hirarki pohon (tree).')

@section('actions')
<a href="{{ route('admin.struktur-organisasi.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl text-sm transition">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
    Tambah Anggota
</a>
@endsection

@section('content')
<div x-data="{ activeTab: 'tree' }" class="space-y-6">
    <!-- Tab Controls -->
    <div class="border-b border-slate-200 flex items-center gap-1">
        <button 
            @click="activeTab = 'tree'" 
            :class="activeTab === 'tree' ? 'border-blue-600 text-blue-600 font-semibold' : 'border-transparent text-slate-500 hover:text-slate-700'"
            class="px-4 py-3 border-b-2 text-sm transition focus:outline-none shrink-0"
        >
            Tampilan Pohon (Tree View)
        </button>
        <button 
            @click="activeTab = 'table'" 
            :class="activeTab === 'table' ? 'border-blue-600 text-blue-600 font-semibold' : 'border-transparent text-slate-500 hover:text-slate-700'"
            class="px-4 py-3 border-b-2 text-sm transition focus:outline-none shrink-0"
        >
            Tampilan Tabel (Table View)
        </button>
    </div>

    <!-- TAB 1: TREE VIEW -->
    <div x-show="activeTab === 'tree'" class="space-y-6">
        @if($rootMembers->isEmpty())
            <div class="bg-white border border-slate-200 rounded-2xl p-8 text-center text-slate-500">
                <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                <p class="font-medium text-slate-600">Belum ada anggota struktur organisasi.</p>
                <p class="text-xs text-slate-400 mt-1">Silakan tambahkan anggota pertama sebagai pimpinan tertinggi (Kepala).</p>
            </div>
        @else
            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 overflow-x-auto shadow-inner">
                <div class="min-w-[600px] max-w-4xl space-y-6">
                    @foreach($rootMembers as $root)
                        <div class="relative">
                            <div class="bg-white p-5 border border-slate-200 rounded-2xl flex items-center justify-between shadow-sm hover:shadow-md transition ring-2 ring-blue-600/10">
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-xl overflow-hidden shrink-0 flex items-center justify-center border border-blue-100">
                                        @if($root->avatar)
                                            <img src="{{ asset('storage/' . $root->avatar) }}" class="w-full h-full object-cover">
                                        @else
                                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        @endif
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-slate-900 text-base flex items-center gap-2">
                                            {{ $root->name }}
                                            <span class="text-[10px] px-2 py-0.5 bg-blue-100 text-blue-800 rounded-full font-semibold">Root / Pimpinan</span>
                                        </h3>
                                        <p class="text-xs text-blue-600 font-semibold">{{ $root->position }}</p>
                                        @if($root->nip)
                                            <p class="text-[10px] text-slate-500 mt-0.5 font-mono">NIP. {{ $root->nip }}</p>
                                        @endif
                                        @if($root->specialty)
                                            <p class="text-[10px] text-emerald-600 font-medium mt-0.5">{{ $root->specialty }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="flex items-center gap-2">
                                    <span class="text-xs font-semibold px-2 py-0.5 bg-slate-100 text-slate-600 rounded">Urutan: {{ $root->order }}</span>
                                    <a href="{{ route('admin.struktur-organisasi.edit', $root) }}" class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit Anggota">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('admin.struktur-organisasi.destroy', $root) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota tertinggi ini? Semua bawahan langsungnya akan diset tanpa atasan.')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-rose-600 hover:bg-rose-50 rounded-lg transition" title="Hapus Anggota">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            @if($root->children->isNotEmpty())
                                @include('admin.struktur-organisasi.tree-node', ['children' => $root->children])
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <!-- TAB 2: TABLE VIEW -->
    <div x-show="activeTab === 'table'" class="space-y-6" x-cloak>
        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 font-semibold">
                            <th class="p-4 w-16">Foto</th>
                            <th class="p-4">Nama / NIP</th>
                            <th class="p-4">Jabatan</th>
                            <th class="p-4">Spesialisasi</th>
                            <th class="p-4">Atasan Langsung</th>
                            <th class="p-4 w-20">Urutan</th>
                            <th class="p-4 w-24 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700">
                        @forelse($allMembers as $member)
                            <tr class="hover:bg-slate-50/55 transition">
                                <td class="p-4">
                                    <div class="w-10 h-10 bg-slate-100 rounded-lg overflow-hidden flex items-center justify-center border border-slate-200">
                                        @if($member->avatar)
                                            <img src="{{ asset('storage/' . $member->avatar) }}" class="w-full h-full object-cover">
                                        @else
                                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        @endif
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div class="font-bold text-slate-900">{{ $member->name }}</div>
                                    @if($member->nip)
                                        <div class="text-xs text-slate-500 font-mono">NIP. {{ $member->nip }}</div>
                                    @else
                                        <div class="text-xs text-slate-400 italic">Tidak ada NIP</div>
                                    @endif
                                </td>
                                <td class="p-4 font-medium text-slate-800">{{ $member->position }}</td>
                                <td class="p-4">
                                    @if($member->specialty)
                                        <span class="inline-flex items-center px-2.5 py-0.5 bg-emerald-50 text-emerald-700 text-xs font-semibold rounded-full border border-emerald-100">
                                            {{ $member->specialty }}
                                        </span>
                                    @else
                                        <span class="text-xs text-slate-400 italic">-</span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    @if($member->parent)
                                        <div class="font-semibold text-slate-800 text-xs">{{ $member->parent->name }}</div>
                                        <div class="text-[10px] text-slate-500">{{ $member->parent->position }}</div>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 bg-slate-100 text-slate-600 text-xs font-semibold rounded-full">
                                            Root (Pimpinan Tertinggi)
                                        </span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    <span class="font-mono text-slate-600 font-bold bg-slate-50 px-2.5 py-1 border border-slate-100 rounded text-xs">
                                        {{ $member->order }}
                                    </span>
                                </td>
                                <td class="p-4 text-right space-x-1 whitespace-nowrap">
                                    <a href="{{ route('admin.struktur-organisasi.edit', $member) }}" class="inline-flex items-center justify-center p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('admin.struktur-organisasi.destroy', $member) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')" class="inline">
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
                                    Tidak ada data anggota struktur organisasi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
