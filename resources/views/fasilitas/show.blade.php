@extends('layouts.public')

@section('title', 'Detail Laboratorium - Labkom')

@section('content')
@php
    $labsData = [
        'laboratorium-programming' => [
            'name' => 'Laboratorium Programming',
            'desc' => '<p>Laboratorium Programming merupakan pusat pengembangan perangkat lunak yang dirancang untuk mendukung mahasiswa dalam mempelajari berbagai bahasa pemrograman, algoritma, dan metodologi pengembangan sistem. Laboratorium ini dilengkapi dengan workstation performa tinggi dan lingkungan pengembangan terkini.</p><p>Fokus utama kami adalah memberikan pengalaman praktis dalam membangun aplikasi berbasis web, mobile, maupun desktop dengan standar industri saat ini.</p>',
            'layanan' => [
                'Praktikum Pemrograman Dasar & Lanjut.',
                'Riset Pengembangan Perangkat Lunak.',
                'Workshop & Bootcamp Coding berkala.',
                'Bimbingan Teknis Tugas Akhir.'
            ],
            'fasilitas' => [
                ['title' => '40 Unit PC High-End', 'desc' => 'Intel i7, 16GB RAM, SSD 512GB'],
                ['title' => 'Akses Internet Cepat', 'desc' => 'Dedicated Fiber Optic 100 Mbps'],
                ['title' => 'Smart Board & Proyektor', 'desc' => 'Mendukung Presentasi Interaktif'],
                ['title' => 'Full AC & Co-working Area', 'desc' => 'Lingkungan Belajar yang Nyaman']
            ],
            'kepala' => 'Dr. Aditya, M.T.',
            'pajab_name' => 'Rian Hidayat, S.Kom., M.T.',
            'pajab_nip' => '19920315 202104 1 002',
            'pajab_email' => 'rian.hidayat@labkom.univ.ac.id',
            'lokasi' => 'Gedung Lab Terpadu, Lt. 3',
            'jam' => '08:00 - 16:00 WIB'
        ],
        'laboratorium-networking' => [
            'name' => 'Laboratorium Networking',
            'desc' => '<p>Laboratorium Networking difokuskan pada pembelajaran dan riset mengenai infrastruktur jaringan komputer, administrasi server, keamanan siber, dan teknologi cloud computing. Dilengkapi dengan perangkat jaringan skala industri untuk simulasi real-world.</p><p>Mahasiswa dibimbing untuk menguasai topologi jaringan mendalam serta penanganan insiden keamanan siber.</p>',
            'layanan' => [
                'Praktikum Jaringan Komputer & Keamanan Siber.',
                'Sertifikasi Cisco / Mikrotik Academy.',
                'Riset Infrastruktur Jaringan & Cloud.',
                'Uji Kompetensi Administrasi Jaringan.'
            ],
            'fasilitas' => [
                ['title' => '20 Unit Router & Switch Cisco/Mikrotik', 'desc' => 'Perangkat Jaringan Skala Industri'],
                ['title' => 'Server Rack Enterprise', 'desc' => 'Mendukung Virtualisasi & Cloud'],
                ['title' => 'Workstation Jaringan Dual-LAN', 'desc' => 'Optimasi Simulasi Topologi'],
                ['title' => 'Alat Uji Kabel & Fluke Tester', 'desc' => 'Sertifikasi & Troubleshooting Kabel']
            ],
            'kepala' => 'Dr. Aditya, M.T.',
            'pajab_name' => 'Andi Wijaya, S.T., M.Kom.',
            'pajab_nip' => '19891102 201903 1 005',
            'pajab_email' => 'andi.wijaya@labkom.univ.ac.id',
            'lokasi' => 'Gedung Lab Terpadu, Lt. 3',
            'jam' => '08:00 - 16:00 WIB'
        ],
        'laboratorium-multimedia' => [
            'name' => 'Laboratorium Multimedia',
            'desc' => '<p>Laboratorium Multimedia dirancang khusus untuk mendukung kreativitas mahasiswa dalam bidang desain grafis, editing video, animasi 2D/3D, serta pengembangan game. Didukung perangkat grafis berspesifikasi tinggi dan pen tablet.</p><p>Laboratorium ini juga berfungsi sebagai studio produksi konten kreatif kampus.</p>',
            'layanan' => [
                'Praktikum Desain Grafis & Animasi.',
                'Produksi Konten Kreatif & Video.',
                'Workshop Game Development.',
                'Pelatihan UI/UX Design.'
            ],
            'fasilitas' => [
                ['title' => '30 iMac & PC Grafis Pro', 'desc' => 'Mendukung Rendering Berat & Animasi'],
                ['title' => 'Pen Tablet Wacom Drawing', 'desc' => 'Akurasi Tinggi untuk Ilustrasi Digital'],
                ['title' => 'Studio Green Screen & Lighting', 'desc' => 'Fasilitas Produksi Video Profesional'],
                ['title' => 'Audio Recording Kit', 'desc' => 'Kualitas Suara Jernih untuk Podcast/Dubbing']
            ],
            'kepala' => 'Dr. Aditya, M.T.',
            'pajab_name' => 'Siti Aminah, S.Sn., M.Ds.',
            'pajab_nip' => '19940522 202201 2 001',
            'pajab_email' => 'siti.aminah@labkom.univ.ac.id',
            'lokasi' => 'Gedung Lab Terpadu, Lt. 4',
            'jam' => '08:00 - 16:00 WIB'
        ],
        'laboratorium-ai-data-science' => [
            'name' => 'Laboratorium AI & Data Science',
            'desc' => '<p>Laboratorium AI & Data Science merupakan wadah riset dan pembelajaran di bidang kecerdasan buatan, machine learning, deep learning, dan big data analytics. Dilengkapi dengan server GPU bertenaga tinggi untuk pemrosesan dataset skala besar.</p><p>Kami berfokus menghasilkan inovasi cerdas serta pengolahan wawasan data yang berdampak luas.</p>',
            'layanan' => [
                'Praktikum Kecerdasan Buatan & Data Mining.',
                'Riset Deep Learning & Big Data.',
                'Workshop Analisis Data & Python.',
                'Konsultasi Komputasi Berkinerja Tinggi.'
            ],
            'fasilitas' => [
                ['title' => 'NVIDIA GPU Server Dedicated', 'desc' => 'Akselerasi Training Model Deep Learning'],
                ['title' => '35 Workstation Data Science', 'desc' => 'Spesifikasi Khusus Data Crunching'],
                ['title' => 'Akses Cloud Computing Cluster', 'desc' => 'Skalabilitas Komputasi Tak Terbatas'],
                ['title' => 'Dataset Premium & Tool Analytics', 'desc' => 'Lingkungan Riset Data yang Komprehensif']
            ],
            'kepala' => 'Dr. Aditya, M.T.',
            'pajab_name' => 'Budi Santoso, S.Kom., M.Sc.',
            'pajab_nip' => '19910812 202012 1 003',
            'pajab_email' => 'budi.santoso@labkom.univ.ac.id',
            'lokasi' => 'Gedung Lab Terpadu, Lt. 4',
            'jam' => '08:00 - 16:00 WIB'
        ],
        'laboratorium-hardware' => [
            'name' => 'Laboratorium Hardware',
            'desc' => '<p>Laboratorium Hardware berfokus pada arsitektur komputer, perakitan sistem, perawatan (maintenance), sistem tertanam (embedded systems), internet of things (IoT), serta robotika dasar. Mahasiswa belajar langsung berinteraksi dengan komponen fisik dan mikrokontroler.</p><p>Menyediakan ruang eksperimen kreatif untuk rancang bangun perangkat keras modern.</p>',
            'layanan' => [
                'Praktikum Arsitektur & Perakitan PC.',
                'Riset IoT & Embedded Systems.',
                'Pelatihan Maintenance & Troubleshooting.',
                'Pengembangan Proyek Robotika.'
            ],
            'fasilitas' => [
                ['title' => 'Perangkat Kit IoT (Arduino/Raspberry)', 'desc' => 'Sensor & Aktuator Lengkap untuk Prototyping'],
                ['title' => 'Alat Ukur Oscilloscope & Multimeter', 'desc' => 'Analisis Sinyal & Arus Listrik Akurat'],
                ['title' => 'Stasiun Solder & Tools Maintenance', 'desc' => 'Peralatan Rancang Bangun dan Perbaikan'],
                ['title' => 'Modul Arsitektur Komputer', 'desc' => 'Eksperimen Interfasi Komponen Digital']
            ],
            'kepala' => 'Dr. Aditya, M.T.',
            'pajab_name' => 'Eko Prasetyo, S.T., M.T.',
            'pajab_nip' => '19880724 201808 1 001',
            'pajab_email' => 'eko.prasetyo@labkom.univ.ac.id',
            'lokasi' => 'Gedung Lab Terpadu, Lt. 2',
            'jam' => '08:00 - 16:00 WIB'
        ]
    ];

    $currentLab = $labsData[$slug] ?? $labsData['laboratorium-programming'];
@endphp

<div class="bg-blue-600 py-12">
    <div class="container mx-auto px-4 lg:px-8">
        <a href="{{ route('fasilitas.laboratorium') }}" class="inline-flex items-center gap-2 text-blue-100 mb-6 hover:text-white transition text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg> Kembali ke Fasilitas
        </a>
        <h1 class="text-3xl md:text-5xl font-bold text-white leading-tight">{{ $currentLab['name'] }}</h1>
    </div>
</div>

<div class="container mx-auto px-4 lg:px-8 py-12">
    <div class="flex flex-col lg:flex-row gap-12">
        <div class="lg:w-2/3">
            <!-- Image Gallery Placeholder -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                <div class="aspect-video bg-slate-200 rounded-3xl overflow-hidden md:col-span-2"></div>
                <div class="aspect-video bg-slate-100 rounded-3xl overflow-hidden"></div>
                <div class="aspect-video bg-slate-100 rounded-3xl overflow-hidden"></div>
            </div>

            <div class="prose prose-slate prose-lg max-w-none text-slate-700 leading-relaxed mb-12">
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Deskripsi Laboratorium</h2>
                {!! $currentLab['desc'] !!}
                
                <h3 class="text-xl font-bold text-slate-900 mt-8 mb-4">Layanan & Kegiatan</h3>
                <ul>
                    @foreach($currentLab['layanan'] as $layanan)
                        <li>{{ $layanan }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Peralatan Section -->
            <section class="mb-12">
                <h3 class="text-xl font-bold text-slate-900 mb-6">Fasilitas Utama</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($currentLab['fasilitas'] as $f)
                    <div class="flex items-center gap-4 p-4 bg-white border border-slate-100 rounded-2xl shadow-sm">
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center shrink-0">
                            @if($loop->index == 0)
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 21h6l-.75-4M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            @elseif($loop->index == 1)
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 117.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.256-3.905 14.162 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path></svg>
                            @elseif($loop->index == 2)
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            @else
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            @endif
                        </div>
                        <div>
                            <span class="block font-bold">{{ $f['title'] }}</span>
                            <span class="text-xs text-slate-500">{{ $f['desc'] }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- Penanggung Jawab Section -->
            <section class="mb-12 border-t border-slate-100 pt-12">
                <h3 class="text-xl font-bold text-slate-900 mb-6">Penanggung Jawab Laboratorium</h3>
                <div class="bg-slate-50 rounded-3xl p-6 md:p-8 flex flex-col sm:flex-row items-center sm:items-start gap-6 border border-slate-100">
                    <div class="w-24 h-24 bg-blue-600 text-white font-bold text-3xl rounded-2xl flex items-center justify-center shadow-md shrink-0">
                        {{ collect(explode(' ', $currentLab['pajab_name']))->take(2)->map(fn($n) => substr($n, 0, 1))->implode('') }}
                    </div>
                    <div class="text-center sm:text-left space-y-2 flex-1">
                        <h4 class="text-xl font-bold text-slate-900">{{ $currentLab['pajab_name'] }}</h4>
                        <p class="text-blue-600 font-medium text-sm">Penanggung Jawab Teknis / Laboran</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2 pt-4 text-sm text-slate-600 border-t border-slate-200/60 mt-4">
                            <div class="flex items-center justify-center sm:justify-start gap-2">
                                <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 012-2h2a2 2 0 012 2v1m-6 0a2 2 0 002 2h2a2 2 0 002-2"></path></svg>
                                <span>NIP: {{ $currentLab['pajab_nip'] }}</span>
                            </div>
                            <div class="flex items-center justify-center sm:justify-start gap-2">
                                <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                <a href="mailto:{{ $currentLab['pajab_email'] }}" class="hover:text-blue-600 transition">{{ $currentLab['pajab_email'] }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="lg:w-1/3">
            <div class="sticky top-32 space-y-8">
                <!-- Kontak & Info Lab -->
                <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
                    <h4 class="font-bold text-lg mb-6 text-slate-900 border-b border-slate-100 pb-4">Informasi Lab</h4>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <div>
                                <span class="block text-xs text-slate-400 uppercase tracking-wider font-bold mb-1">Kepala Lab</span>
                                <span class="font-bold text-slate-700">{{ $currentLab['kepala'] }}</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <div>
                                <span class="block text-xs text-blue-500 uppercase tracking-wider font-bold mb-1">Penanggung Jawab</span>
                                <span class="font-bold text-slate-700">{{ $currentLab['pajab_name'] }}</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <span class="block text-xs text-slate-400 uppercase tracking-wider font-bold mb-1">Lokasi</span>
                                <span class="font-bold text-slate-700">{{ $currentLab['lokasi'] }}</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <span class="block text-xs text-slate-400 uppercase tracking-wider font-bold mb-1">Jam Operasional</span>
                                <span class="font-bold text-slate-700">{{ $currentLab['jam'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Card -->
                <div class="bg-slate-900 p-8 rounded-3xl text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-600 rounded-full -translate-y-1/2 translate-x-1/2 blur-2xl opacity-50"></div>
                    <div class="relative z-10">
                        <h4 class="font-bold text-lg mb-4">Butuh Penggunaan Lab?</h4>
                        <p class="text-slate-400 text-sm mb-6 leading-relaxed">Silakan unduh formulir peminjaman alat atau ruangan melalui pusat unduhan kami.</p>
                        <a href="{{ route('unduhan.index') }}" class="block w-full py-4 bg-blue-600 text-white text-center font-bold rounded-2xl hover:bg-blue-700 transition shadow-lg shadow-blue-600/20">Ke Pusat Unduhan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
