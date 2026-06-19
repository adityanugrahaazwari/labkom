@extends('layouts.admin')

@section('title', 'Dashboard')
@section('subtitle', 'Selamat datang kembali, ' . auth()->user()->name . '. Berikut adalah ringkasan aktivitas sistem.')

@section('actions')
    <div class="flex gap-3">
        <a href="{{ route('admin.berita.create') }}" class="px-4 py-2.5 bg-white border border-slate-200 hover:border-slate-350 hover:bg-slate-50 text-slate-700 font-bold rounded-xl text-xs transition-all duration-200 flex items-center gap-2 shadow-sm hover:shadow active:scale-95">
            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
            Tulis Berita
        </a>
        <a href="{{ route('admin.agenda.create') }}" class="px-4 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold rounded-xl text-xs transition-all duration-200 flex items-center gap-2 shadow-md hover:shadow-lg active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Agenda
        </a>
    </div>
@endsection

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
        @php
            $accentClass = match($stat['color']) {
                'blue' => 'border-t-4 border-t-blue-500',
                'green' => 'border-t-4 border-t-emerald-500',
                'indigo' => 'border-t-4 border-t-indigo-500',
                'purple' => 'border-t-4 border-t-purple-500',
                default => 'border-t-4 border-t-slate-500'
            };
            $bgClass = match($stat['color']) {
                'blue' => 'bg-gradient-to-br from-blue-500/10 to-blue-500/5 text-blue-600 border-blue-500/10',
                'green' => 'bg-gradient-to-br from-emerald-500/10 to-emerald-500/5 text-emerald-600 border-emerald-500/10',
                'indigo' => 'bg-gradient-to-br from-indigo-500/10 to-indigo-500/5 text-indigo-600 border-indigo-500/10',
                'purple' => 'bg-gradient-to-br from-purple-500/10 to-purple-500/5 text-purple-600 border-purple-500/10',
                default => 'bg-gradient-to-br from-slate-500/10 to-slate-500/5 text-slate-600 border-slate-500/10'
            };
        @endphp
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-305 flex flex-col justify-between {{ $accentClass }}">
            <div class="flex items-center justify-between mb-4">
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
                
                @if($stat['color'] == 'blue')
                    <span class="inline-flex items-center gap-1 text-[10px] font-bold text-blue-700 bg-blue-50/80 px-2.5 py-1 border border-blue-100 rounded-full font-mono">
                        <svg class="w-3 h-3 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        {{ $stat['trend'] }}
                    </span>
                @elseif($stat['color'] == 'green')
                    <span class="inline-flex items-center gap-1.5 text-[10px] font-bold text-emerald-700 bg-emerald-50/80 px-2.5 py-1 border border-emerald-100 rounded-full font-mono">
                        <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse shrink-0"></span>
                        {{ $stat['trend'] }}
                    </span>
                @elseif($stat['color'] == 'indigo')
                    <span class="inline-flex items-center gap-1 text-[10px] font-bold text-indigo-700 bg-indigo-50/80 px-2.5 py-1 border border-indigo-100 rounded-full font-mono">
                        <svg class="w-3 h-3 text-indigo-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        {{ $stat['trend'] }}
                    </span>
                @elseif($stat['color'] == 'purple')
                    <span class="inline-flex items-center gap-1 text-[10px] font-bold text-purple-700 bg-purple-50/80 px-2.5 py-1 border border-purple-100 rounded-full font-mono">
                        <svg class="w-3 h-3 text-purple-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ $stat['trend'] }}
                    </span>
                @else
                    <span class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2.5 py-1 border border-slate-200/50 rounded-full font-mono">
                        {{ $stat['trend'] }}
                    </span>
                @endif
            </div>
            <div>
                <p class="text-3xl font-black text-slate-900 font-mono tracking-tight">{{ $stat['value'] }}</p>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mt-1.5">{{ $stat['label'] }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Unified Dashboard Grid (Single Parent layout) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left Column: Content Tables -->
        <div class="lg:col-span-2 space-y-8">
            
            <!-- Berita Terbaru -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-3 bg-blue-600 rounded-full"></span>
                        <h3 class="font-bold text-slate-800 text-sm">Berita Terbaru</h3>
                    </div>
                    <a href="{{ route('admin.berita.index') }}" class="text-xs font-bold text-blue-600 hover:text-blue-700 transition">Lihat Semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200/50 text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                <th class="px-6 py-4">Judul Konten</th>
                                <th class="px-6 py-4 w-28">Kategori</th>
                                <th class="px-6 py-4 w-20 text-center">Views</th>
                                <th class="px-6 py-4 w-28 text-center">Status</th>
                                <th class="px-6 py-4 w-32">Tanggal</th>
                                <th class="px-6 py-4 w-12 text-right"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            @forelse ($recentNews as $item)
                            <tr class="hover:bg-slate-50/40 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="shrink-0 w-8 h-8 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-slate-600 text-xs shadow-sm">
                                            {{ substr($item->user->name ?? 'A', 0, 1) }}
                                        </div>
                                        <div class="overflow-hidden">
                                            <a href="{{ route('admin.berita.edit', $item) }}" class="font-bold text-slate-800 hover:text-blue-600 transition block truncate max-w-[200px]" title="{{ $item->title }}">
                                                {{ $item->title }}
                                            </a>
                                            <p class="text-[10px] text-slate-400 mt-0.5">Oleh: <span class="font-medium text-slate-500">{{ $item->user->name ?? 'Admin' }}</span></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-0.5 bg-blue-50 text-blue-600 border border-blue-100 text-[9px] font-bold rounded uppercase tracking-wider">
                                        {{ $item->category->name ?? 'Berita' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center font-mono font-bold text-slate-600">
                                    {{ $item->views }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if($item->is_published)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 bg-emerald-50 text-emerald-700 text-[10px] font-bold rounded-full border border-emerald-100">
                                            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                                            Published
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 bg-slate-100 text-slate-500 text-[10px] font-bold rounded-full border border-slate-200">
                                            <span class="w-1.5 h-1.5 bg-slate-400 rounded-full"></span>
                                            Draft
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-mono text-[10px] text-slate-500">
                                    {{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d M Y') : $item->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('admin.berita.edit', $item) }}" class="inline-flex items-center justify-center p-1.5 text-blue-600 hover:bg-blue-50 hover:text-blue-700 rounded-lg transition" title="Edit Berita">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                        <span>Belum ada konten berita.</span>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Unduhan Terpopuler -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-3 bg-indigo-600 rounded-full"></span>
                        <h3 class="font-bold text-slate-800 text-sm">Unduhan Terpopuler</h3>
                    </div>
                    <a href="{{ route('admin.documents.index') }}" class="text-xs font-bold text-indigo-600 hover:text-indigo-700 transition">Kelola Dokumen</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200/50 text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                <th class="px-6 py-4">Nama Dokumen</th>
                                <th class="px-6 py-4 w-36">Ukuran Berkas</th>
                                <th class="px-6 py-4 w-36 text-center">Total Diunduh</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            @forelse ($popularDocuments as $doc)
                            @php
                                $ext = pathinfo($doc->file_path, PATHINFO_EXTENSION);
                                $iconColor = match(strtolower($ext)) {
                                    'pdf' => 'text-red-600 bg-red-50 border-red-150',
                                    'zip', 'rar' => 'text-amber-600 bg-amber-50 border-amber-150',
                                    'doc', 'docx' => 'text-blue-600 bg-blue-50 border-blue-150',
                                    'xls', 'xlsx' => 'text-emerald-600 bg-emerald-50 border-emerald-150',
                                    default => 'text-slate-600 bg-slate-50 border-slate-150'
                                };
                                $iconLetter = strtoupper($ext ?: 'DOC');
                            @endphp
                            <tr class="hover:bg-slate-50/40 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="shrink-0 w-9 h-9 rounded-lg border flex flex-col items-center justify-center font-mono font-bold text-[9px] {{ $iconColor }} shadow-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                            <span class="text-[7px] uppercase mt-0.5 leading-none font-black">{{ $iconLetter }}</span>
                                        </div>
                                        <div class="overflow-hidden">
                                            <p class="font-bold text-slate-800 line-clamp-1" title="{{ $doc->title }}">{{ $doc->title }}</p>
                                            <p class="text-[10px] text-slate-400 mt-0.5 line-clamp-1">{{ $doc->description ?? 'Tidak ada deskripsi berkas.' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-semibold text-slate-500 font-mono">
                                    {{ $doc->file_size }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center gap-1 text-[11px] font-bold text-indigo-700 bg-indigo-50 px-3 py-0.5 border border-indigo-150 rounded font-mono">
                                        <svg class="w-3 h-3 text-indigo-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                        {{ $doc->download_count }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="px-6 py-12 text-center text-slate-400">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 002 2zm0 0V9"></path></svg>
                                        <span>Belum ada dokumen terunggah.</span>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- Right Column: Sidebar Widgets -->
        <div class="space-y-8">
            
            <!-- Log Aktivitas Admin -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex flex-col h-[380px] hover:shadow-md transition-shadow duration-300">
                <div class="flex items-center gap-2 mb-6 border-b border-slate-55 pb-4 justify-between shrink-0">
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-3 bg-blue-600 rounded-full"></span>
                        <h3 class="font-bold text-slate-800 text-sm">Log Aktivitas Admin</h3>
                    </div>
                    <svg class="w-4 h-4 text-slate-450" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                </div>
                
                <div class="space-y-6 relative before:absolute before:inset-y-0 before:left-3 before:w-px before:bg-slate-100 flex-1 overflow-y-auto pr-2 custom-scrollbar">
                    @forelse ($recentLogs as $log)
                    @php
                        $dotColor = match($log->action) {
                            'tambah' => 'bg-emerald-500 border-emerald-100 ring-emerald-50',
                            'ubah' => 'bg-blue-500 border-blue-100 ring-blue-50',
                            'hapus' => 'bg-rose-500 border-rose-100 ring-rose-50',
                            default => 'bg-slate-400 border-slate-100 ring-slate-50'
                        };
                        $actionBadge = match($log->action) {
                            'tambah' => 'bg-emerald-50 text-emerald-700 border-emerald-100',
                            'ubah' => 'bg-blue-50 text-blue-700 border-blue-100',
                            'hapus' => 'bg-rose-50 text-rose-700 border-rose-100',
                            default => 'bg-slate-100 text-slate-600 border-slate-200'
                        };
                    @endphp
                    <div class="relative pl-8 pb-5 last:pb-0">
                        <!-- Bullet indicator -->
                        <div class="absolute left-0 top-1.5 w-6 h-6 bg-white border border-slate-150 rounded-full flex items-center justify-center z-10 shadow-sm">
                            <div class="w-2 h-2 rounded-full {{ $dotColor }}"></div>
                        </div>
                        
                        <div class="flex flex-col gap-1">
                            <div class="flex items-center gap-2 flex-wrap">
                                <span class="px-2 py-0.5 text-[8px] font-extrabold uppercase rounded border {{ $actionBadge }} tracking-wide font-sans">
                                    {{ $log->action }}
                                </span>
                                <span class="text-[9px] font-bold text-slate-450 uppercase tracking-wider font-mono">
                                    {{ $log->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <p class="text-xs text-slate-700 leading-relaxed font-semibold">
                                {{ $log->description }}
                            </p>
                            <p class="text-[9px] text-slate-450 font-mono">
                                Oleh: <span class="font-bold text-slate-500">{{ $log->user->name ?? 'System' }}</span> &bull; IP: {{ $log->ip_address }}
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-12 text-slate-400 text-xs">
                        Belum ada riwayat aktivitas.
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Agenda Terjadwal -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex flex-col h-[300px] hover:shadow-md transition-shadow duration-300">
                <div class="flex items-center gap-2 mb-6 border-b border-slate-55 pb-4 justify-between shrink-0">
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-3 bg-emerald-600 rounded-full"></span>
                        <h3 class="font-bold text-slate-800 text-sm">Agenda Terjadwal</h3>
                    </div>
                    <svg class="w-4 h-4 text-slate-450" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                
                <div class="space-y-4 flex-1 overflow-y-auto pr-2 custom-scrollbar">
                    @forelse ($activeAgendas as $agenda)
                    <div class="p-3 bg-slate-50/70 border border-slate-150 rounded-2xl hover:border-blue-500/20 hover:bg-blue-50/10 transition-all duration-300 hover:shadow-sm flex gap-3 items-center">
                        <div class="flex flex-col items-center shrink-0 w-12 rounded-xl overflow-hidden border border-blue-100 shadow-sm bg-white font-sans">
                            <div class="w-full bg-blue-600 text-[8px] font-extrabold uppercase tracking-wider py-1 text-center text-white leading-none">
                                {{ $agenda->event_date->format('M') }}
                            </div>
                            <div class="text-base font-black text-slate-800 py-1.5 leading-none font-mono">
                                {{ $agenda->event_date->format('d') }}
                            </div>
                        </div>
                        <div class="overflow-hidden flex-1">
                            <h4 class="text-xs font-bold text-slate-850 truncate" title="{{ $agenda->title }}">
                                <a href="{{ route('admin.agenda.edit', $agenda) }}" class="hover:text-blue-600 transition">{{ $agenda->title }}</a>
                            </h4>
                            <p class="text-[10px] text-slate-500 mt-1 flex items-center gap-1">
                                <svg class="w-3 h-3 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span class="truncate">Ruang: {{ $agenda->location }}</span>
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-12 text-slate-400 text-xs">
                        Belum ada agenda kegiatan terdaftar.
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Akses Pengguna & Fasilitas (Dark Card) -->
            <div class="bg-gradient-to-br from-slate-900 via-slate-855 to-slate-950 rounded-2xl p-6 text-white shadow-xl shadow-slate-900/10 hover:shadow-2xl transition-all duration-300 relative overflow-hidden group">
                <!-- Accent decorative background glow -->
                <div class="absolute -right-16 -top-16 w-32 h-32 bg-blue-500/10 rounded-full blur-2xl group-hover:bg-blue-500/15 transition-all duration-300 pointer-events-none"></div>
                <div class="absolute -left-16 -bottom-16 w-32 h-32 bg-indigo-500/10 rounded-full blur-2xl group-hover:bg-indigo-500/15 transition-all duration-300 pointer-events-none"></div>
                
                <div class="flex items-center justify-between mb-6 shrink-0 z-10 relative">
                    <h3 class="font-bold text-[10px] uppercase tracking-wider text-slate-400">Akses Pengguna & Fasilitas</h3>
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                
                <div class="space-y-4 text-xs z-10 relative">
                    <!-- Total Pengguna -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded bg-white/5 border border-white/10 flex items-center justify-center text-slate-400">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </div>
                            <span class="text-slate-350">Total Pengguna Terdaftar</span>
                        </div>
                        <span class="font-bold text-white font-mono bg-white/10 px-2 py-0.5 rounded border border-white/5">{{ $totalUser }} Akun</span>
                    </div>
                    
                    <!-- Laboratorium Aktif -->
                    <div class="flex items-center justify-between border-t border-slate-800/80 pt-4">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded bg-white/5 border border-white/10 flex items-center justify-center text-slate-400">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <span class="text-slate-350">Laboratorium Aktif</span>
                        </div>
                        <span class="font-bold text-white font-mono bg-white/10 px-2 py-0.5 rounded border border-white/5">{{ $totalLab }} Ruang</span>
                    </div>
                    
                    <!-- Pertanyaan FAQ -->
                    <div class="flex items-center justify-between border-t border-slate-800/80 pt-4">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded bg-white/5 border border-white/10 flex items-center justify-center text-slate-400">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <span class="text-slate-350">Pertanyaan FAQ</span>
                        </div>
                        <span class="font-bold text-white font-mono bg-white/10 px-2 py-0.5 rounded border border-white/5">{{ $totalFaq }} Pasang</span>
                    </div>
                </div>
            </div>

            <!-- Server Info Card -->
            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow transition-shadow duration-300">
                <div class="flex items-center gap-2 mb-6 justify-between shrink-0">
                    <h3 class="font-bold text-slate-700 text-[10px] uppercase tracking-wider">Informasi Lingkungan Sistem</h3>
                    <span class="inline-flex items-center gap-1.5 px-2 py-0.5 bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 rounded-full text-[9px] font-bold">
                        <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
                        Aktif
                    </span>
                </div>
                <div class="space-y-3 font-mono text-[10px] text-slate-500">
                    <div class="flex justify-between items-center">
                        <span class="text-slate-450">Laravel Version:</span>
                        <span class="font-semibold text-slate-750 bg-slate-200/50 px-2 py-0.5 rounded">{{ $systemInfo['laravel_version'] }}</span>
                    </div>
                    <div class="flex justify-between items-center border-t border-slate-150 pt-2.5">
                        <span class="text-slate-455">PHP Version:</span>
                        <span class="font-semibold text-slate-755 bg-slate-200/50 px-2 py-0.5 rounded">{{ $systemInfo['php_version'] }}</span>
                    </div>
                    <div class="flex justify-between items-center border-t border-slate-150 pt-2.5">
                        <span class="text-slate-455">DB Driver:</span>
                        <span class="font-semibold text-slate-755 bg-slate-200/50 px-2 py-0.5 rounded uppercase font-bold">{{ $systemInfo['db_driver'] }}</span>
                    </div>
                    <div class="flex justify-between items-center border-t border-slate-150 pt-2.5">
                        <span class="text-slate-455">Environment:</span>
                        <span class="font-semibold text-slate-755 bg-slate-200/50 px-2 py-0.5 rounded uppercase font-bold text-blue-600">{{ $systemInfo['app_env'] }}</span>
                    </div>
                    <div class="flex justify-between items-center border-t border-slate-150 pt-2.5">
                        <span class="text-slate-455">Debug Mode:</span>
                        <span class="font-semibold text-slate-755 bg-slate-205 px-2 py-0.5 rounded {{ strtolower($systemInfo['debug_mode']) == 'enabled' ? 'text-emerald-600 bg-emerald-50/50 font-bold border border-emerald-100/50' : 'text-slate-600' }}">{{ $systemInfo['debug_mode'] }}</span>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
@endsection
