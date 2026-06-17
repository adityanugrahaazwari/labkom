@extends('layouts.public')

@section('title', 'Visi & Misi - Labkom')

@section('content')
<div class="bg-blue-600 py-16">
    <div class="container mx-auto px-4 lg:px-8">
        <h1 class="text-4xl font-bold text-white mb-4">Visi & Misi</h1>
        <p class="text-blue-100 text-lg">Landasan utama arah pengembangan Laboratorium Komputer.</p>
    </div>
</div>

<div class="container mx-auto px-4 lg:px-8 py-16">
    <div class="max-w-4xl mx-auto">
        <section class="mb-16">
            <h2 class="text-2xl font-bold mb-6 flex items-center gap-3">
                <span class="w-10 h-1 bg-blue-600 rounded-full"></span>
                Visi
            </h2>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                <p class="text-lg text-slate-700 leading-relaxed italic">
                    "Menjadi pusat informasi digital Laboratorium Komputer yang modern, informatif, profesional, dan mudah diakses untuk mendukung kegiatan akademik, publikasi, dokumentasi, serta pelayanan informasi laboratorium."
                </p>
            </div>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-6 flex items-center gap-3">
                <span class="w-10 h-1 bg-blue-600 rounded-full"></span>
                Misi
            </h2>
            <div class="grid gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex gap-4">
                    <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center font-bold shrink-0">1</div>
                    <p class="text-slate-700">Menyediakan informasi laboratorium secara terpusat.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex gap-4">
                    <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center font-bold shrink-0">2</div>
                    <p class="text-slate-700">Mendukung penyebaran informasi yang cepat dan akurat.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex gap-4">
                    <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center font-bold shrink-0">3</div>
                    <p class="text-slate-700">Menyediakan sarana publikasi kegiatan laboratorium.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex gap-4">
                    <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center font-bold shrink-0">4</div>
                    <p class="text-slate-700">Mendukung dokumentasi kegiatan secara berkelanjutan.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex gap-4">
                    <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center font-bold shrink-0">5</div>
                    <p class="text-slate-700">Meningkatkan kualitas pelayanan informasi kepada civitas akademika dan masyarakat.</p>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
