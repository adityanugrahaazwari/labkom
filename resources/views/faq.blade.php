@extends('layouts.public')

@section('title', 'FAQ - Labkom')

@section('content')
<div class="bg-blue-600 py-16">
    <div class="container mx-auto px-4 lg:px-8">
        <h1 class="text-4xl font-bold text-white mb-4">FAQ</h1>
        <p class="text-blue-100 text-lg">Pertanyaan yang sering diajukan seputar Laboratorium Komputer.</p>
    </div>
</div>

<div class="container mx-auto px-4 lg:px-8 py-16">
    <div class="max-w-3xl mx-auto space-y-6" x-data="{ activeFaq: null }">
        @forelse($faqs as $faq)
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden hover:shadow transition duration-300">
                <button 
                    @click="activeFaq = (activeFaq === {{ $faq->id }} ? null : {{ $faq->id }})"
                    class="w-full text-left px-8 py-5 font-bold text-slate-800 hover:text-blue-600 flex items-center justify-between transition focus:outline-none"
                >
                    <span class="text-sm md:text-base leading-snug">{{ $faq->question }}</span>
                    <svg 
                        :class="activeFaq === {{ $faq->id }} ? 'rotate-180 text-blue-600' : 'text-slate-400'"
                        class="w-5 h-5 transition-transform duration-300 shrink-0" 
                        fill="none" 
                        stroke="currentColor" 
                        viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div 
                    x-show="activeFaq === {{ $faq->id }}" 
                    x-cloak
                    class="px-8 pb-6 text-slate-600 text-sm leading-relaxed border-t border-slate-50 pt-4"
                >
                    {!! nl2br(e($faq->answer)) !!}
                </div>
            </div>
        @empty
            <div class="bg-white border border-slate-200 rounded-3xl p-16 text-center text-slate-500 shadow-sm">
                <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="text-lg font-bold text-slate-700">Belum ada FAQ</h3>
                <p class="text-sm text-slate-400 mt-1">Daftar tanya-jawab belum dimasukkan oleh admin.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
