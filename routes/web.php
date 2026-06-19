<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\SettingController;

use App\Http\Controllers\PublicController;

// Public Routes
Route::get('/', [PublicController::class, 'home'])->name('home');

Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/visi-misi', [PublicController::class, 'visiMisi'])->name('visi-misi');
    Route::get('/struktur-organisasi', [PublicController::class, 'strukturOrganisasi'])->name('struktur-organisasi');
});

Route::prefix('fasilitas')->name('fasilitas.')->group(function () {
    Route::get('/laboratorium', [PublicController::class, 'laboratorium'])->name('laboratorium');
    Route::get('/laboratorium/{slug}', [PublicController::class, 'laboratoriumDetail'])->name('show');
});

Route::prefix('berita')->name('berita.')->group(function () {
    Route::get('/', [PublicController::class, 'berita'])->name('index');
    Route::get('/{slug}', [PublicController::class, 'beritaDetail'])->name('show');
});

Route::prefix('unduhan')->name('unduhan.')->group(function () {
    Route::get('/', [PublicController::class, 'unduhan'])->name('index');
});

Route::redirect('/login', '/admin/login')->name('login');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Auth Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });

    // Protected Admin Routes
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Users Management
        Route::middleware('can:manage-users')->group(function () {
            Route::resource('users', UserController::class);
        });

        // Roles Management
        Route::middleware('can:manage-roles')->group(function () {
            Route::resource('roles', RoleController::class);
        });

        // Menus Management
        Route::middleware('can:manage-menus')->group(function () {
            Route::resource('menus', MenuController::class);
        });

        // Permissions Management
        Route::middleware('can:manage-permissions')->group(function () {
            Route::resource('permissions', PermissionController::class);
        });

        // Settings Management
        Route::middleware('can:manage-settings')->group(function () {
            Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
            Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
        });
    });
});
