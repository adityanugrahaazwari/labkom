@extends('layouts.admin')

@section('title', 'Dashboard')
@section('subtitle', 'Selamat datang kembali, Aditya. Berikut adalah ringkasan aktivitas hari ini.')

@section('actions')
    <div class="flex gap-3">
        <button class="px-4 py-2 bg-white border border-slate-200 text-slate-700 font-bold rounded-xl text-sm hover:bg-slate-50 transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            Export Laporan
        </button>
        <button class="px-4 py-2 bg-blue-600 text-white font-bold rounded-xl text-sm hover:bg-blue-700 transition flex items-center gap-2 shadow-lg shadow-blue-100">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Konten
        </button>
    </div>
@endsection

@section('content')
    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @php
            $stats = [
                ['label' => 'Total Berita', 'value' => '124', 'trend' => '+12%', 'icon' => 'newspaper', 'color' => 'blue'],
                ['label' => 'Pengumuman', 'value' => '42', 'trend' => '+2', 'icon' => 'speakerphone', 'color' => 'indigo'],
                ['label' => 'Total Agenda', 'value' => '12', 'trend' => '-1', 'icon' => 'calendar', 'color' => 'green'],
                ['label' => 'Pengunjung', 'value' => '1.2k', 'trend' => '+18%', 'icon' => 'user-group', 'color' => 'purple'],
            ];
        @endphp

        @foreach ($stats as $stat)
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 bg-{{ $stat['color'] }}-100 rounded-xl flex items-center justify-center text-{{ $stat['color'] }}-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        @if($stat['icon'] == 'newspaper') <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        @elseif($stat['icon'] == 'speakerphone') <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        @elseif($stat['icon'] == 'calendar') <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        @else <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        @endif
                    </svg>
                </div>
                <span class="text-xs font-bold {{ str_contains($stat['trend'], '+') ? 'text-green-600 bg-green-50' : 'text-red-600 bg-red-50' }} px-2 py-1 rounded-full">
                    {{ $stat['trend'] }}
                </span>
            </div>
            <p class="text-2xl font-black text-slate-900">{{ $stat['value'] }}</p>
            <p class="text-xs font-medium text-slate-500 uppercase tracking-widest mt-1">{{ $stat['label'] }}</p>
        </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Activities -->
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                    <h3 class="font-bold text-slate-900">Konten Terbaru</h3>
                    <a href="#" class="text-xs font-bold text-blue-600 hover:underline">Lihat Semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50">
                                <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Judul Konten</th>
                                <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Tipe</th>
                                <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Status</th>
                                <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Tanggal</th>
                                <th class="px-6 py-4"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @for ($i = 1; $i <= 5; $i++)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4">
                                    <p class="text-sm font-bold text-slate-900 line-clamp-1">Workshop AI untuk Mahasiswa Tingkat Akhir</p>
                                    <p class="text-[10px] text-slate-500">Oleh: Admin Lab</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 bg-blue-50 text-blue-600 text-[10px] font-bold rounded-lg uppercase">Berita</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-1.5">
                                        <div class="w-1.5 h-1.5 bg-green-500 rounded-full"></div>
                                        <span class="text-xs font-medium text-slate-700">Published</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-xs text-slate-500">12 Jun 2026</td>
                                <td class="px-6 py-4 text-right">
                                    <button class="p-2 hover:bg-slate-100 rounded-lg transition text-slate-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                                    </button>
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- System Logs -->
        <div class="space-y-8">
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">
                <h3 class="font-bold text-slate-900 mb-6">Log Aktivitas</h3>
                <div class="space-y-6 relative before:absolute before:inset-y-0 before:left-3 before:w-px before:bg-slate-100">
                    @php
                        $logs = [
                            ['user' => 'Aditya', 'action' => 'menerbitkan berita baru', 'time' => '2 menit yang lalu'],
                            ['user' => 'Sistem', 'action' => 'backup database berhasil', 'time' => '1 jam yang lalu'],
                            ['user' => 'Budi', 'action' => 'mengubah jadwal agenda', 'time' => '3 jam yang lalu'],
                            ['user' => 'Rina', 'action' => 'mengunggah galeri foto', 'time' => 'Kemarin'],
                        ];
                    @endphp

                    @foreach ($logs as $log)
                    <div class="relative pl-8">
                        <div class="absolute left-0 top-1.5 w-6 h-6 bg-white border-2 border-slate-100 rounded-full flex items-center justify-center z-10">
                            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                        </div>
                        <p class="text-sm">
                            <span class="font-bold text-slate-900">{{ $log['user'] }}</span>
                            <span class="text-slate-600">{{ $log['action'] }}</span>
                        </p>
                        <p class="text-[10px] text-slate-400 mt-1 uppercase font-bold tracking-wider">{{ $log['time'] }}</p>
                    </div>
                    @endforeach
                </div>
                <button class="w-full mt-8 py-3 bg-slate-50 text-slate-600 text-xs font-bold rounded-xl hover:bg-slate-100 transition">Lihat Seluruh Log</button>
            </div>

            <!-- Storage Info -->
            <div class="bg-slate-900 rounded-3xl p-6 text-white shadow-xl shadow-slate-200">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-bold">Media Storage</h3>
                    <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <div class="mb-4">
                    <div class="flex justify-between text-xs mb-2">
                        <span class="text-slate-400">Terpakai: 1.2 GB</span>
                        <span class="text-white">Total: 5 GB</span>
                    </div>
                    <div class="h-2 bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-blue-500 rounded-full w-[24%]"></div>
                    </div>
                </div>
                <p class="text-[10px] text-slate-500 italic">Otomatis dibersihkan setiap 30 hari.</p>
            </div>
        </div>
    </div>
@endsection
