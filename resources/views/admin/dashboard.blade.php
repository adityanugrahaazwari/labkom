@extends('layouts.admin')

@section('title', 'Dashboard')
@section('subtitle', 'Selamat datang kembali, ' . auth()->user()->name . '. Berikut adalah ringkasan aktivitas sistem.')

@section('content')
    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @php
            $stats = [
                ['label' => 'Total Berita', 'value' => $totalNews, 'trend' => $totalNewsViews . ' Baca', 'icon' => 'newspaper', 'color' => 'blue'],
                ['label' => 'Agenda Kegiatan', 'value' => $totalAgenda, 'trend' => 'Aktif', 'icon' => 'calendar', 'color' => 'green'],
                ['label' => 'Dokumen Unduhan', 'value' => $totalDocument, 'trend' => $totalDownloads . ' Unduh', 'icon' => 'folder-open', 'color' => 'indigo'],
                ['label' => 'Tanya Jawab (FAQ)', 'value' => $totalFaq, 'trend' => 'Aktif', 'icon' => 'question-mark-circle', 'color' => 'purple'],
            ];
        @endphp

        @foreach ($stats as $stat)
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                @php
                    $bgClass = match($stat['color']) {
                        'blue' => 'bg-blue-50 text-blue-600 border-blue-100/50',
                        'green' => 'bg-emerald-50 text-emerald-600 border-emerald-100/50',
                        'indigo' => 'bg-indigo-50 text-indigo-600 border-indigo-100/50',
                        'purple' => 'bg-purple-50 text-purple-600 border-purple-100/50',
                        default => 'bg-slate-50 text-slate-600 border-slate-100/50'
                    };
                @endphp
                <div class="w-10 h-10 rounded-xl flex items-center justify-center border {{ $bgClass }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        @if($stat['icon'] == 'newspaper')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        @elseif($stat['icon'] == 'calendar')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        @elseif($stat['icon'] == 'folder-open')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 002 2zm0 0V9"></path>
                        @elseif($stat['icon'] == 'question-mark-circle')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        @else
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        @endif
                    </svg>
                </div>
                <span class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2 py-0.5 border border-slate-200/50 rounded-full font-mono">
                    {{ $stat['trend'] }}
                </span>
            </div>
            <p class="text-2xl font-black text-slate-900 font-mono">{{ $stat['value'] }}</p>
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest mt-1">{{ $stat['label'] }}</p>
        </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Activities / News -->
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                    <h3 class="font-bold text-slate-900">Berita Terbaru</h3>
                    <a href="{{ route('admin.berita.index') }}" class="text-xs font-bold text-blue-600 hover:underline">Lihat Semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                <th class="px-6 py-4">Judul Konten</th>
                                <th class="px-6 py-4">Kategori</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Tanggal Buat</th>
                                <th class="px-6 py-4"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($recentNews as $item)
                            <tr class="hover:bg-slate-50/50 transition">
                                <td class="px-6 py-4">
                                    <p class="text-sm font-bold text-slate-900 line-clamp-1" title="{{ $item->title }}">{{ $item->title }}</p>
                                    <p class="text-[10px] text-slate-400">Oleh: {{ $item->user->name ?? 'Admin' }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-0.5 bg-blue-50 text-blue-600 border border-blue-100 text-[10px] font-bold rounded-lg uppercase">
                                        {{ $item->category->name ?? 'Berita' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($item->is_published)
                                        <div class="flex items-center gap-1.5">
                                            <div class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></div>
                                            <span class="text-xs font-semibold text-slate-600">Published</span>
                                        </div>
                                    @else
                                        <div class="flex items-center gap-1.5">
                                            <div class="w-1.5 h-1.5 bg-amber-500 rounded-full"></div>
                                            <span class="text-xs font-semibold text-slate-600">Draft</span>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-xs font-mono text-slate-500">
                                    {{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d M Y') : $item->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('admin.berita.edit', $item) }}" class="p-2 hover:bg-slate-100 rounded-lg transition inline-block text-blue-600" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-slate-400">
                                    Belum ada konten berita.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- System Activity Logs -->
        <div class="space-y-8">
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">
                <h3 class="font-bold text-slate-900 mb-6">Log Aktivitas Admin</h3>
                <div class="space-y-6 relative before:absolute before:inset-y-0 before:left-3 before:w-px before:bg-slate-100 max-h-[380px] overflow-y-auto pr-2 custom-scrollbar">
                    @forelse ($recentLogs as $log)
                    <div class="relative pl-8">
                        <div class="absolute left-0 top-1.5 w-6 h-6 bg-white border border-slate-150 rounded-full flex items-center justify-center z-10 shadow-sm">
                            @php
                                $dotColor = match($log->action) {
                                    'tambah' => 'bg-emerald-500',
                                    'ubah' => 'bg-blue-500',
                                    'hapus' => 'bg-rose-500',
                                    default => 'bg-slate-400'
                                };
                            @endphp
                            <div class="w-1.5 h-1.5 {{ $dotColor }} rounded-full"></div>
                        </div>
                        <p class="text-xs text-slate-700 font-semibold leading-normal">
                            {{ $log->description }}
                        </p>
                        <p class="text-[9px] text-slate-400 mt-1 uppercase font-bold tracking-wider font-mono" title="{{ $log->created_at->format('d M Y H:i:s') }} (IP: {{ $log->ip_address }})">
                            {{ $log->created_at->diffForHumans() }} &bull; IP: {{ $log->ip_address }}
                        </p>
                    </div>
                    @empty
                    <div class="text-center py-8 text-slate-400 text-sm">
                        Belum ada riwayat aktivitas.
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- System Info -->
            <div class="bg-slate-900 rounded-3xl p-6 text-white shadow-xl shadow-slate-200">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-bold text-xs uppercase tracking-wider">Akses Pengguna & Fasilitas</h3>
                    <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-slate-400">Total Pengguna Terdaftar</span>
                        <span class="font-bold text-white font-mono">{{ $totalUser }} Akun</span>
                    </div>
                    <div class="flex items-center justify-between text-xs border-t border-slate-800 pt-3">
                        <span class="text-slate-400">Laboratorium Aktif</span>
                        <span class="font-bold text-white font-mono">{{ $totalLab }} Ruang</span>
                    </div>
                    <div class="flex items-center justify-between text-xs border-t border-slate-800 pt-3">
                        <span class="text-slate-400">Pertanyaan FAQ</span>
                        <span class="font-bold text-white font-mono">{{ $totalFaq }} Pasang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
