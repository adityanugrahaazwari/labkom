@extends('layouts.public')

@section('title', 'Unduhan Dokumen - Labkom')

@section('content')
<div class="bg-blue-600 py-16">
    <div class="container mx-auto px-4 lg:px-8">
        <h1 class="text-4xl font-bold text-white mb-4">Unduhan</h1>
        <p class="text-blue-100 text-lg">Pusat dokumen, modul, dan formulir Laboratorium Komputer.</p>
    </div>
</div>

<div class="container mx-auto px-4 lg:px-8 py-16">
    <div class="max-w-4xl mx-auto">
        <div class="flex flex-col md:flex-row gap-4 mb-12">
            <div class="flex-1 relative">
                <svg class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <input type="text" placeholder="Cari dokumen..." class="w-full pl-12 pr-4 py-4 rounded-2xl border-slate-200 focus:border-blue-600 focus:ring-blue-600 transition shadow-sm">
            </div>
            <select class="px-6 py-4 rounded-2xl border-slate-200 focus:border-blue-600 focus:ring-blue-600 transition shadow-sm bg-white">
                <option>Semua Kategori</option>
                <option>Modul Praktikum</option>
                <option>Formulir</option>
                <option>SOP</option>
            </select>
        </div>

        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="px-8 py-4 font-bold text-sm text-slate-600">Nama Dokumen</th>
                        <th class="px-8 py-4 font-bold text-sm text-slate-600">Kategori</th>
                        <th class="px-8 py-4 font-bold text-sm text-slate-600">Ukuran</th>
                        <th class="px-8 py-4 text-right"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @php
                        $docs = [
                            ['name' => 'Formulir Peminjaman Alat.pdf', 'cat' => 'Formulir', 'size' => '245 KB'],
                            ['name' => 'SOP Penggunaan Laboratorium.pdf', 'cat' => 'SOP', 'size' => '1.2 MB'],
                            ['name' => 'Modul Praktikum Struktur Data.pdf', 'cat' => 'Modul', 'size' => '4.5 MB'],
                            ['name' => 'Panduan E-Certificate.pdf', 'cat' => 'Panduan', 'size' => '890 KB'],
                            ['name' => 'Template Laporan Praktikum.docx', 'cat' => 'Dokumen', 'size' => '156 KB'],
                        ];
                    @endphp

                    @foreach($docs as $doc)
                    <tr class="hover:bg-slate-50 transition group">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                </div>
                                <span class="font-bold text-slate-700">{{ $doc['name'] }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-slate-100 text-slate-600 rounded-full text-xs font-medium">{{ $doc['cat'] }}</span>
                        </td>
                        <td class="px-8 py-6 text-sm text-slate-500">{{ $doc['size'] }}</td>
                        <td class="px-8 py-6 text-right">
                            <a href="#" class="inline-flex items-center gap-2 text-blue-600 font-bold text-sm hover:underline">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Unduh
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
