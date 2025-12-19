<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PPDBController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminHomeSettingController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AdminAuthController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [PPDBController::class, 'index'])->name('home');

// Jenjang & Lembaga
Route::get('/daftar/{jenjang}', [PPDBController::class, 'pilihJenjang'])->name('pilih.jenjang');
Route::post('/pilih-lembaga', [PPDBController::class, 'pilihLembaga'])->name('pilih.lembaga');

// Form Data Pribadi
Route::get('/form-data-pribadi/{id}/{jenjang}', [PPDBController::class, 'formDataPribadi'])
    ->name('form.data.pribadi');
Route::post('/form-data-pribadi/store', [PPDBController::class, 'storeDataPribadi'])->name('form.data.pribadi.store');

Route::get('/form-ortu/{id}', [PPDBController::class, 'formOrtu'])->name('form.ortu');
Route::post('/form-ortu/store', [PPDBController::class, 'storeOrtu'])->name('form.ortu.store');

Route::get('/form-dokumen/{id}', [PPDBController::class, 'formDokumen'])->name('form.dokumen');
Route::post('/form-dokumen/store', [PPDBController::class, 'storeDokumen'])->name('form.dokumen.store');

// Biodata
Route::get('/biodata/{id}', [PPDBController::class, 'biodata'])->name('biodata');
Route::put('/biodata/{id}/update', [PPDBController::class, 'updateBiodata'])->name('biodata.update');
Route::put('/biodata/{id}/update-dokumen', [PPDBController::class, 'updateDokumen'])->name('biodata.update.dokumen');

// Cetak & Download
Route::get('/cetak/{id}', [PPDBController::class, 'cetak'])->name('cetak');
Route::get('/siswa/{id}/download', [PPDBController::class, 'downloadPdf'])->name('students.download');

// Pengumuman (Public)
Route::get('/pengumuman', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('/pengumuman/{id}', [AnnouncementController::class, 'show'])->name('announcements.show');


/*
|--------------------------------------------------------------------------
| ADMIN AUTH ROUTES (TANPA MIDDLEWARE)
|--------------------------------------------------------------------------
*/

Route::get('/admin', [AdminAuthController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::get('/admin/edit-profile', [AdminAuthController::class, 'editProfile'])->name('admin.editProfile');
Route::post('/admin/update-profile', [AdminAuthController::class, 'updateProfile'])->name('admin.updateProfile');


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (MIDDLEWARE ADMIN)
|--------------------------------------------------------------------------
*/

Route::middleware('admin')->group(function () {

    // Dashboard & Data
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('/admin/data-siswa', [AdminController::class, 'dataSiswa'])
        ->name('admin.data_siswa');

    Route::get('/admin/export-csv/{lembaga}', [AdminController::class, 'exportCSV'])
        ->name('admin.export_csv');

    /*
    |--------------------------------------------------------------------------
    | ADMIN HOME SETTINGS
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin/home-settings')->name('admin.home_settings.')->group(function () {

        Route::get('/', [AdminHomeSettingController::class, 'index'])
            ->name('index');

        // Slider
        Route::post('/slider', [AdminHomeSettingController::class, 'storeSlider'])
            ->name('slider.store');
        Route::delete('/slider/{id}', [AdminHomeSettingController::class, 'deleteSlider'])
            ->name('slider.destroy');

        // Requirement
        Route::post('/requirement', [AdminHomeSettingController::class, 'storeRequirement'])
            ->name('requirement.store');
        Route::delete('/requirement/{id}', [AdminHomeSettingController::class, 'deleteRequirement'])
            ->name('requirement.destroy');

        // Flow
        Route::post('/flow', [AdminHomeSettingController::class, 'storeFlow'])
            ->name('flow.store');
        Route::delete('/flow/{id}', [AdminHomeSettingController::class, 'deleteFlow'])
            ->name('flow.destroy');

        // Toggle Button
        Route::post('/toggle-register-button', [AdminHomeSettingController::class, 'toggleRegisterButton'])
            ->name('toggle_register_button');

        // Units
        Route::post('/units', [AdminHomeSettingController::class, 'storeUnit'])
            ->name('units.store');
        Route::post('/units/{id}/update-link', [AdminHomeSettingController::class, 'updateUnitLink'])
            ->name('units.updateLink');
        Route::delete('/units/{id}', [AdminHomeSettingController::class, 'destroyUnit'])
            ->name('units.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | ADMIN PENGUMUMAN
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin/pengumuman')->name('admin.announcements.')->group(function () {

        Route::get('/', [AnnouncementController::class, 'adminIndex'])->name('index');
        Route::get('/create', [AnnouncementController::class, 'create'])->name('create');
        Route::post('/', [AnnouncementController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AnnouncementController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AnnouncementController::class, 'update'])->name('update');
        Route::delete('/{id}', [AnnouncementController::class, 'destroy'])->name('destroy');
        Route::patch('/{id}/toggle', [AnnouncementController::class, 'toggleStatus'])->name('toggle');
    });

});
