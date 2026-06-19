@extends('layouts.public')

@section('title', 'Unduhan Dokumen - Labkom')

@section('content')
<div class="bg-blue-600 py-16">
    <div class="container mx-auto px-4 lg:px-8">
        <h1 class="text-4xl font-bold text-white mb-4">Unduhan</h1>
        <p class="text-blue-100 text-lg">Pusat dokumen, modul, dan formulir Laboratorium Komputer.</p>
    </div>
</div>

<div x-data="{
    search: '',
    get filteredDocs() {
        if (!this.search) return this.docs;
        return this.docs.filter(d => d.title.toLowerCase().includes(this.search.toLowerCase()));
    },
    docs: {{ json_encode($documents) }}
}" class="container mx-auto px-4 lg:px-8 py-16">
    <div class="max-w-4xl mx-auto space-y-8">
        
        <!-- Search filter -->
        <div class="relative">
            <svg class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input 
                type="text" 
                x-model="search"
                placeholder="Cari dokumen, modul, atau formulir..." 
                class="w-full pl-12 pr-4 py-4 rounded-2xl border border-slate-200 focus:border-blue-600 focus:ring-blue-600 transition shadow-sm text-sm font-medium focus:outline-none"
            >
        </div>

        <!-- Documents Table Card -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-slate-500 font-semibold text-xs">
                        <th class="px-8 py-4">Nama Dokumen</th>
                        <th class="px-8 py-4 w-32">Ukuran</th>
                        <th class="px-8 py-4 w-36 text-center">Unduhan</th>
                        <th class="px-8 py-4 w-28 text-right"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    <template x-for="doc in filteredDocs" :key="doc.id">
                        <tr class="hover:bg-slate-50 transition group">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center shrink-0">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <div>
                                        <span class="font-bold text-slate-800 text-sm block" x-text="doc.title"></span>
                                        <span class="text-xs text-slate-400 block mt-0.5" x-text="doc.description || 'Tidak ada deskripsi'"></span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-xs font-mono text-slate-500" x-text="doc.file_size"></td>
                            <td class="px-8 py-5 text-xs text-slate-500 text-center font-bold" x-text="doc.download_count.toLocaleString() + ' kali'"></td>
                            <td class="px-8 py-5 text-right">
                                <a :href="'/unduhan/download/' + doc.id" class="inline-flex items-center gap-1.5 text-blue-600 font-bold text-xs hover:underline">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    Unduh
                                </a>
                            </td>
                        </tr>
                    </template>
                    <tr x-show="filteredDocs.length === 0" x-cloak>
                        <td colspan="4" class="p-8 text-center text-slate-400 text-sm font-medium">
                            Tidak ada dokumen yang cocok dengan pencarian Anda.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
