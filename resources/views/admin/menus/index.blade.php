@extends('layouts.admin')

@section('title', 'Manajemen Menu Navigasi')
@section('subtitle', 'Kelola menu navigasi header publik dan sidebar panel admin secara dinamis.')

@section('actions')
    <a href="{{ route('admin.menus.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Menu
    </a>
@endsection

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Header Menus (Public Website) -->
    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
        <div class="flex items-center justify-between pb-4 border-b border-slate-100">
            <div>
                <h3 class="text-base font-bold text-slate-900">Navigasi Header (Website Publik)</h3>
                <p class="text-xs text-slate-400">Daftar menu utama di bagian atas website publik.</p>
            </div>
            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">Public</span>
        </div>

        <div class="space-y-3">
            @forelse($headerMenus as $menu)
                @include('admin.menus.partials.menu-item', ['menu' => $menu])
            @empty
                <p class="text-sm text-slate-400 text-center py-6">Belum ada menu header publik.</p>
            @endforelse
        </div>
    </div>

    <!-- Sidebar Menus (Admin Panel) -->
    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
        <div class="flex items-center justify-between pb-4 border-b border-slate-100">
            <div>
                <h3 class="text-base font-bold text-slate-900">Navigasi Sidebar (Dashboard Admin)</h3>
                <p class="text-xs text-slate-400">Daftar menu samping di dalam halaman administrasi.</p>
            </div>
            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-purple-50 text-purple-700 border border-purple-100">Admin</span>
        </div>

        <div class="space-y-3">
            @forelse($sidebarMenus as $menu)
                @include('admin.menus.partials.menu-item', ['menu' => $menu])
            @empty
                <p class="text-sm text-slate-400 text-center py-6">Belum ada menu sidebar admin.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
