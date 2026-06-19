<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VisiMisiController;
use App\Http\Controllers\Admin\StrukturOrganisasiController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\LaboratoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\AgendaController;

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
    Route::get('/download/{id}', [PublicController::class, 'downloadDocument'])->name('download');
});

Route::get('/faq', [PublicController::class, 'faq'])->name('faq');

Route::prefix('agenda')->name('agenda.')->group(function () {
    Route::get('/', [PublicController::class, 'agenda'])->name('index');
    Route::get('/{slug}', [PublicController::class, 'agendaDetail'])->name('show');
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

        // Profiles & Organisasi Management
        Route::middleware('can:manage-profiles')->group(function () {
            Route::get('visi-misi', [VisiMisiController::class, 'edit'])->name('visi-misi.edit');
            Route::put('visi-misi', [VisiMisiController::class, 'update'])->name('visi-misi.update');
            Route::resource('struktur-organisasi', StrukturOrganisasiController::class)->except(['show']);
        });

        // News & Categories Management
        Route::middleware('can:manage-berita')->group(function () {
            Route::resource('berita-kategori', NewsCategoryController::class)->except(['show']);
            Route::resource('berita', NewsController::class)->except(['show']);
        });

        // Documents / Download Management
        Route::middleware('can:manage-documents')->group(function () {
            Route::resource('documents', DocumentController::class)->except(['show']);
        });

        // Facilities / Laboratory Management
        Route::middleware('can:manage-facilities')->group(function () {
            Route::resource('facilities', LaboratoryController::class)->except(['show']);
        });

        // FAQ Management
        Route::middleware('can:manage-faq')->group(function () {
            Route::resource('faq', FaqController::class)->except(['show']);
        });

        // Agenda Management
        Route::middleware('can:manage-agenda')->group(function () {
            Route::resource('agenda', AgendaController::class)->except(['show']);
        });
    });
});
