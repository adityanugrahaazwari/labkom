@extends('layouts.admin')

@section('title', 'Manajemen Pengguna')
@section('subtitle', 'Kelola data pengguna, peran, dan hak akses staf laboratorium.')

@section('actions')
    <a href="{{ route('admin.users.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Pengguna
    </a>
@endsection

@section('content')
<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-xs font-bold text-slate-500 uppercase tracking-wider">
                    <th class="py-4 px-6">Nama</th>
                    <th class="py-4 px-6">Email</th>
                    <th class="py-4 px-6">Peran (Role)</th>
                    <th class="py-4 px-6">Tanggal Dibuat</th>
                    <th class="py-4 px-6 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                @forelse($users as $user)
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-4 px-6 font-semibold text-slate-900">{{ $user->name }}</td>
                        <td class="py-4 px-6 text-slate-500">{{ $user->email }}</td>
                        <td class="py-4 px-6">
                            <div class="flex flex-wrap gap-1">
                                @forelse($user->roles as $role)
                                    @php
                                        $badgeColor = match($role->name) {
                                            'super-admin' => 'bg-red-50 text-red-700 border-red-200',
                                            'admin' => 'bg-blue-50 text-blue-700 border-blue-200',
                                            'kepala-lab' => 'bg-purple-50 text-purple-700 border-purple-200',
                                            'laboran' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                            default => 'bg-slate-50 text-slate-700 border-slate-200',
                                        };
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border {{ $badgeColor }}">
                                        {{ $role->display_name }}
                                    </span>
                                @empty
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border bg-slate-50 text-slate-400 border-slate-200">
                                        Tidak ada peran
                                    </span>
                                @endforelse
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-500">{{ $user->created_at->format('d M Y, H:i') }}</td>
                        <td class="py-4 px-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="p-2 hover:bg-slate-100 rounded-lg text-slate-600 hover:text-blue-600 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                @if($user->id !== auth()->id())
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 hover:bg-slate-100 rounded-lg text-slate-600 hover:text-red-600 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-slate-400">Belum ada pengguna.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
