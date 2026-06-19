@extends('layouts.admin')

@section('title', 'Pengaturan Website & Landing Page')
@section('subtitle', 'Kelola konfigurasi tampilan Beranda (Hero, Sambutan, Footer) dan media sosial.')

@section('content')
<div x-data="{ activeTab: 'hero' }" class="space-y-6">
    <!-- Tab Bar Nav -->
    <div class="border-b border-slate-200 flex items-center gap-1">
        <button 
            @click="activeTab = 'hero'" 
            :class="activeTab === 'hero' ? 'border-blue-600 text-blue-600 font-semibold' : 'border-transparent text-slate-500 hover:text-slate-700'"
            class="px-4 py-3 border-b-2 text-sm transition focus:outline-none shrink-0"
        >
            Hero Section
        </button>
        <button 
            @click="activeTab = 'greetings'" 
            :class="activeTab === 'greetings' ? 'border-blue-600 text-blue-600 font-semibold' : 'border-transparent text-slate-500 hover:text-slate-700'"
            class="px-4 py-3 border-b-2 text-sm transition focus:outline-none shrink-0"
        >
            Sambutan Kepala Lab
        </button>
        <button 
            @click="activeTab = 'footer'" 
            :class="activeTab === 'footer' ? 'border-blue-600 text-blue-600 font-semibold' : 'border-transparent text-slate-500 hover:text-slate-700'"
            class="px-4 py-3 border-b-2 text-sm transition focus:outline-none shrink-0"
        >
            Footer, Kontak & Sosial
        </button>
    </div>

    <!-- Form Settings -->
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="max-w-4xl bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
        @csrf

        <!-- TAB: HERO -->
        <div x-show="activeTab === 'hero'" class="space-y-6">
            <h3 class="text-sm font-bold text-slate-900 border-b border-slate-100 pb-3">Konfigurasi Hero Section</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Judul Hero -->
                <div class="space-y-2 col-span-2">
                    <label for="hero_title" class="text-sm font-semibold text-slate-700">Judul Utama (Title)</label>
                    <input 
                        type="text" 
                        name="hero_title" 
                        id="hero_title" 
                        value="{{ old('hero_title', $settings['hero_title'] ?? '') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                        required
                    >
                </div>

                <!-- Subtitle Hero -->
                <div class="space-y-2 col-span-2">
                    <label for="hero_subtitle" class="text-sm font-semibold text-slate-700">Deskripsi Singkat (Subtitle)</label>
                    <textarea 
                        name="hero_subtitle" 
                        id="hero_subtitle" 
                        rows="3"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                        required
                    >{{ old('hero_subtitle', $settings['hero_subtitle'] ?? '') }}</textarea>
                </div>

                <!-- Tombol Utama (Primary Button) -->
                <div class="space-y-2">
                    <label for="hero_primary_btn_text" class="text-sm font-semibold text-slate-700">Teks Tombol Utama</label>
                    <input 
                        type="text" 
                        name="hero_primary_btn_text" 
                        id="hero_primary_btn_text" 
                        value="{{ old('hero_primary_btn_text', $settings['hero_primary_btn_text'] ?? '') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                        required
                    >
                </div>

                <div class="space-y-2">
                    <label for="hero_primary_btn_url" class="text-sm font-semibold text-slate-700">URL Tombol Utama</label>
                    <input 
                        type="text" 
                        name="hero_primary_btn_url" 
                        id="hero_primary_btn_url" 
                        value="{{ old('hero_primary_btn_url', $settings['hero_primary_btn_url'] ?? '') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                        required
                    >
                </div>

                <!-- Tombol Kedua (Secondary Button) -->
                <div class="space-y-2">
                    <label for="hero_secondary_btn_text" class="text-sm font-semibold text-slate-700">Teks Tombol Kedua</label>
                    <input 
                        type="text" 
                        name="hero_secondary_btn_text" 
                        id="hero_secondary_btn_text" 
                        value="{{ old('hero_secondary_btn_text', $settings['hero_secondary_btn_text'] ?? '') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                        required
                    >
                </div>

                <div class="space-y-2">
                    <label for="hero_secondary_btn_url" class="text-sm font-semibold text-slate-700">URL Tombol Kedua</label>
                    <input 
                        type="text" 
                        name="hero_secondary_btn_url" 
                        id="hero_secondary_btn_url" 
                        value="{{ old('hero_secondary_btn_url', $settings['hero_secondary_btn_url'] ?? '') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                        required
                    >
                </div>

                <!-- Gambar Latar Belakang (Hero Background) -->
                <div class="space-y-2 col-span-2">
                    <label class="text-sm font-semibold text-slate-700 block">Gambar Hero</label>
                    <div class="flex items-center gap-6 p-4 border border-slate-200 rounded-xl">
                        <div class="w-32 h-20 bg-slate-100 rounded-lg overflow-hidden shrink-0 border border-slate-200 flex items-center justify-center">
                            @if(!empty($settings['hero_image']))
                                <img src="{{ asset('storage/' . $settings['hero_image']) }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-xs text-slate-400">No Image</span>
                            @endif
                        </div>
                        <div class="space-y-1">
                            <input type="file" name="hero_image" class="text-xs text-slate-500">
                            <p class="text-[10px] text-slate-400">Format JPEG/PNG. Maksimal 2MB.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB: GREETINGS -->
        <div x-show="activeTab === 'greetings'" class="space-y-6">
            <h3 class="text-sm font-bold text-slate-900 border-b border-slate-100 pb-3">Sambutan Kepala Laboratorium</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Judul Sambutan -->
                <div class="space-y-2 col-span-2">
                    <label for="greetings_title" class="text-sm font-semibold text-slate-700">Judul Sambutan</label>
                    <input 
                        type="text" 
                        name="greetings_title" 
                        id="greetings_title" 
                        value="{{ old('greetings_title', $settings['greetings_title'] ?? '') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                        required
                    >
                </div>

                <!-- Nama Kepala Lab -->
                <div class="space-y-2">
                    <label for="greetings_name" class="text-sm font-semibold text-slate-700">Nama Lengkap & Gelar</label>
                    <input 
                        type="text" 
                        name="greetings_name" 
                        id="greetings_name" 
                        value="{{ old('greetings_name', $settings['greetings_name'] ?? '') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                        required
                    >
                </div>

                <!-- Jabatan Kepala Lab -->
                <div class="space-y-2">
                    <label for="greetings_role" class="text-sm font-semibold text-slate-700">Jabatan / Role</label>
                    <input 
                        type="text" 
                        name="greetings_role" 
                        id="greetings_role" 
                        value="{{ old('greetings_role', $settings['greetings_role'] ?? '') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                        required
                    >
                </div>

                <!-- Isi Sambutan -->
                <div class="space-y-2 col-span-2">
                    <label for="greetings_content" class="text-sm font-semibold text-slate-700">Isi Sambutan</label>
                    <textarea 
                        name="greetings_content" 
                        id="greetings_content" 
                        rows="5"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                        required
                    >{{ old('greetings_content', $settings['greetings_content'] ?? '') }}</textarea>
                </div>

                <!-- Foto Kepala Lab (Avatar) -->
                <div class="space-y-2 col-span-2">
                    <label class="text-sm font-semibold text-slate-700 block">Foto Kepala Laboratorium</label>
                    <div class="flex items-center gap-6 p-4 border border-slate-200 rounded-xl">
                        <div class="w-20 h-20 bg-slate-100 rounded-xl overflow-hidden shrink-0 border border-slate-200 flex items-center justify-center">
                            @if(!empty($settings['greetings_avatar']))
                                <img src="{{ asset('storage/' . $settings['greetings_avatar']) }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-xs text-slate-400">No Foto</span>
                            @endif
                        </div>
                        <div class="space-y-1">
                            <input type="file" name="greetings_avatar" class="text-xs text-slate-500">
                            <p class="text-[10px] text-slate-400">Format JPEG/PNG. Rasio kotak (1:1) direkomendasikan. Maks 2MB.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB: FOOTER & SOCIALS -->
        <div x-show="activeTab === 'footer'" class="space-y-6">
            <h3 class="text-sm font-bold text-slate-900 border-b border-slate-100 pb-3">Footer & Informasi Kontak</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Deskripsi Singkat Footer -->
                <div class="space-y-2 col-span-2">
                    <label for="footer_about" class="text-sm font-semibold text-slate-700">Tentang Laboratorium (Tentang Kami Singkat)</label>
                    <textarea 
                        name="footer_about" 
                        id="footer_about" 
                        rows="3"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                        required
                    >{{ old('footer_about', $settings['footer_about'] ?? '') }}</textarea>
                </div>

                <!-- Alamat -->
                <div class="space-y-2 col-span-2">
                    <label for="footer_address" class="text-sm font-semibold text-slate-700">Alamat Kantor Resmi</label>
                    <input 
                        type="text" 
                        name="footer_address" 
                        id="footer_address" 
                        value="{{ old('footer_address', $settings['footer_address'] ?? '') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                        required
                    >
                </div>

                <!-- Email Kontak -->
                <div class="space-y-2">
                    <label for="footer_email" class="text-sm font-semibold text-slate-700">Alamat Email Resmi</label>
                    <input 
                        type="email" 
                        name="footer_email" 
                        id="footer_email" 
                        value="{{ old('footer_email', $settings['footer_email'] ?? '') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                        required
                    >
                </div>

                <!-- Telepon Kontak -->
                <div class="space-y-2">
                    <label for="footer_phone" class="text-sm font-semibold text-slate-700">Nomor Telepon Resmi</label>
                    <input 
                        type="text" 
                        name="footer_phone" 
                        id="footer_phone" 
                        value="{{ old('footer_phone', $settings['footer_phone'] ?? '') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                        required
                    >
                </div>

                <!-- Teks Hak Cipta (Copyright) -->
                <div class="space-y-2 col-span-2">
                    <label for="footer_copyright" class="text-sm font-semibold text-slate-700">Teks Hak Cipta (Copyright Text)</label>
                    <input 
                        type="text" 
                        name="footer_copyright" 
                        id="footer_copyright" 
                        value="{{ old('footer_copyright', $settings['footer_copyright'] ?? '') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                        required
                    >
                </div>
            </div>

            <h3 class="text-sm font-bold text-slate-900 border-b border-slate-100 pt-4 pb-3">Tautan Media Sosial</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Instagram -->
                <div class="space-y-2">
                    <label for="social_instagram" class="text-sm font-semibold text-slate-700">Instagram URL</label>
                    <input 
                        type="url" 
                        name="social_instagram" 
                        id="social_instagram" 
                        value="{{ old('social_instagram', $settings['social_instagram'] ?? '') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                        placeholder="https://instagram.com/username"
                    >
                </div>

                <!-- Facebook -->
                <div class="space-y-2">
                    <label for="social_facebook" class="text-sm font-semibold text-slate-700">Facebook URL</label>
                    <input 
                        type="url" 
                        name="social_facebook" 
                        id="social_facebook" 
                        value="{{ old('social_facebook', $settings['social_facebook'] ?? '') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                        placeholder="https://facebook.com/page"
                    >
                </div>

                <!-- YouTube -->
                <div class="space-y-2">
                    <label for="social_youtube" class="text-sm font-semibold text-slate-700">YouTube URL</label>
                    <input 
                        type="url" 
                        name="social_youtube" 
                        id="social_youtube" 
                        value="{{ old('social_youtube', $settings['social_youtube'] ?? '') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                        placeholder="https://youtube.com/c/channel"
                    >
                </div>

                <!-- LinkedIn -->
                <div class="space-y-2">
                    <label for="social_linkedin" class="text-sm font-semibold text-slate-700">LinkedIn URL</label>
                    <input 
                        type="url" 
                        name="social_linkedin" 
                        id="social_linkedin" 
                        value="{{ old('social_linkedin', $settings['social_linkedin'] ?? '') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition text-sm"
                        placeholder="https://linkedin.com/company/name"
                    >
                </div>
            </div>
        </div>

        <!-- Tombol Aksi Form -->
        <div class="flex items-center gap-3 pt-8 mt-8 border-t border-slate-100">
            <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm transition">
                Simpan Pengaturan
            </button>
            <button type="button" @click="location.reload()" class="px-5 py-2.5 border border-slate-200 hover:bg-slate-50 text-slate-700 font-medium rounded-xl text-sm transition">
                Reset
            </button>
        </div>
    </form>
</div>
@endsection
