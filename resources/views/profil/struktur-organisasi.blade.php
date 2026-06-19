@extends('layouts.public')

@section('title', 'Struktur Organisasi - Labkom')

@section('content')
<div class="bg-blue-600 py-16">
    <div class="container mx-auto px-4 lg:px-8">
        <h1 class="text-4xl font-bold text-white mb-4">Struktur Organisasi</h1>
        <p class="text-blue-100 text-lg">Susunan kepengurusan dan hirarki manajemen Laboratorium Komputer.</p>
    </div>
</div>

<div x-data="{ activeView: 'chart' }" class="container mx-auto px-4 lg:px-8 py-12">
    <div class="max-w-7xl mx-auto space-y-8">
        
        <!-- View Switcher -->
        <div class="flex items-center justify-between border-b border-slate-200 pb-4">
            <div class="flex items-center gap-1 bg-slate-100 p-1.5 rounded-2xl">
                <button 
                    @click="activeView = 'chart'"
                    :class="activeView === 'chart' ? 'bg-white text-slate-800 font-bold shadow-sm' : 'text-slate-600 hover:text-slate-900 font-medium'"
                    class="px-5 py-2.5 rounded-xl text-sm transition focus:outline-none flex items-center gap-2"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    Bagan Organisasi (Chart)
                </button>
                <button 
                    @click="activeView = 'list'"
                    :class="activeView === 'list' ? 'bg-white text-slate-800 font-bold shadow-sm' : 'text-slate-600 hover:text-slate-900 font-medium'"
                    class="px-5 py-2.5 rounded-xl text-sm transition focus:outline-none flex items-center gap-2"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    Hirarki Vertikal (List)
                </button>
            </div>

            <div x-show="activeView === 'chart'" class="hidden md:flex items-center gap-2 text-xs text-slate-400">
                <svg class="w-4 h-4 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                <span>Gunakan geser horizontal (swipe) untuk menjelajahi bagan</span>
            </div>
        </div>

        @if($rootMembers->isEmpty())
            <div class="bg-white border border-slate-200 rounded-3xl p-16 text-center text-slate-500 shadow-sm">
                <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <h3 class="text-lg font-bold text-slate-700">Belum ada struktur organisasi</h3>
                <p class="text-sm text-slate-400 mt-1">Data kepengurusan saat ini sedang kosong atau belum diinput oleh admin.</p>
            </div>
        @else
            <!-- VIEW: DYNAMIC TREE CHART -->
            <div x-show="activeView === 'chart'" class="bg-slate-50 border border-slate-200 rounded-3xl p-10 overflow-x-auto shadow-inner flex justify-center">
                <div class="inline-flex py-4 flex-col items-center gap-16">
                    @foreach($rootMembers as $root)
                        @include('profil.struktur-node', ['node' => $root])
                    @endforeach
                </div>
            </div>

            <!-- VIEW: VERTICAL HIERARCHY LIST -->
            <div x-show="activeView === 'list'" class="max-w-3xl mx-auto space-y-6" x-cloak>
                @foreach($rootMembers as $root)
                    <div class="relative">
                        <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4 hover:shadow-md hover:border-blue-100 transition-all duration-300 ring-2 ring-blue-600/5">
                            <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-xl overflow-hidden shrink-0 flex items-center justify-center border border-blue-100">
                                @if($root->avatar)
                                    <img src="{{ asset('storage/' . $root->avatar) }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                @endif
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 text-base">{{ $root->name }}</h3>
                                <p class="text-xs text-blue-600 font-semibold">{{ $root->position }}</p>
                                @if($root->nip)
                                    <p class="text-[10px] text-slate-400 mt-0.5 font-mono">NIP. {{ $root->nip }}</p>
                                @endif
                                @if($root->specialty)
                                    <p class="text-[10px] text-emerald-700 font-semibold mt-1 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100 inline-block">
                                        {{ $root->specialty }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        @if($root->children->isNotEmpty())
                            @include('profil.struktur-list-node', ['children' => $root->children])
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</div>
@endsection
