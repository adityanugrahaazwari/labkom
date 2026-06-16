<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Admin LabKom</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>
<body class="font-sans antialiased bg-slate-50 flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-md">
        <div class="text-center mb-10">
            <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center text-white font-bold text-3xl mx-auto mb-6 shadow-xl shadow-blue-100">L</div>
            <h1 class="text-3xl font-black text-slate-900 mb-2">Selamat Datang</h1>
            <p class="text-slate-500 font-medium">Masuk ke panel administrasi LabKom</p>
        </div>

        <div class="bg-white p-8 lg:p-10 rounded-[2.5rem] border border-slate-200 shadow-xl shadow-slate-100/50">
            <form action="{{ route('admin.login') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-5 py-4 bg-slate-50 border @error('email') border-red-500 @else border-slate-100 @enderror rounded-2xl focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-50 transition outline-none" placeholder="admin@labkom.com">
                    @error('email')
                        <p class="text-xs text-red-500 mt-2 ml-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2 ml-1">
                        <label for="password" class="block text-xs font-bold text-slate-400 uppercase tracking-widest">Password</label>
                        <a href="#" class="text-xs font-bold text-blue-600 hover:underline">Lupa Password?</a>
                    </div>
                    <input type="password" id="password" name="password" required class="w-full px-5 py-4 bg-slate-50 border @error('email') border-red-500 @else border-slate-100 @enderror rounded-2xl focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-50 transition outline-none" placeholder="••••••••">
                </div>

                <div class="flex items-center gap-3 ml-1">
                    <input type="checkbox" id="remember" name="remember" class="w-5 h-5 border-slate-200 rounded text-blue-600 focus:ring-blue-500 transition cursor-pointer">
                    <label for="remember" class="text-sm font-medium text-slate-600 cursor-pointer">Ingat Saya</label>
                </div>

                <button type="submit" class="w-full py-5 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 transition shadow-lg shadow-blue-100 flex items-center justify-center gap-2 group">
                    Masuk ke Dashboard
                    <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </form>
        </div>

        <p class="text-center mt-10 text-sm text-slate-400 font-medium">
            &copy; 2026 CMS Laboratorium Komputer. <br>
            Dikembangkan secara <span class="text-slate-900">Native</span> dengan Laravel.
        </p>
    </div>
</body>
</html>
