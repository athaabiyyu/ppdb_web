<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PPDBController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeSettingController;
use App\Http\Controllers\AdminHomeSettingController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AdminAuthController;

Route::get('/', [PPDBController::class, 'index'])->name('home');
Route::get('/daftar/{jenjang}', [PPDBController::class, 'pilihJenjang']);
Route::post('/pilih-lembaga', [PPDBController::class, 'pilihLembaga']);
Route::get('/form-data-pribadi/{id}/{jenjang}', [PPDBController::class, 'formDataPribadi'])->name('form.data.pribadi');
Route::post('/form-data-pribadi/store', [PPDBController::class, 'storeDataPribadi']);
Route::get('/form-ortu/{id}', [PPDBController::class, 'formOrtu'])->name('form.ortu');
Route::post('/form-ortu/store', [PPDBController::class, 'storeOrtu']);
Route::get('/form-dokumen/{id}', [PPDBController::class, 'formDokumen'])->name('form.dokumen');
Route::post('/form-dokumen/store', [PPDBController::class, 'storeDokumen'])->name('form.dokumen.store');
Route::get('/biodata/{id}', [PPDBController::class, 'biodata'])->name('biodata');
Route::put('/biodata/{id}/update-dokumen', [PPDBController::class, 'updateDokumen'])->name('biodata.update.dokumen');

// ROUTE BARU UNTUK UPDATE BIODATA
Route::put('/biodata/{id}/update', [PPDBController::class, 'updateBiodata'])->name('biodata.update');

Route::get('/cetak/{id}', [PPDBController::class, 'cetak'])->name('cetak');
Route::get('/siswa/{id}/download', [PPDBController::class, 'downloadPdf'])->name('students.download');

Route::get('/admin', [AdminAuthController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::get('/admin/edit-profile', [AdminAuthController::class, 'editProfile'])->name('admin.editProfile');
Route::post('/admin/update-profile', [AdminAuthController::class, 'updateProfile'])->name('admin.updateProfile');

Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');
    Route::get('/admin/data-siswa', [AdminController::class, 'dataSiswa'])
        ->name('admin.data_siswa');
    Route::get('/admin/export-csv/{lembaga}', [AdminController::class, 'exportCSV'])
        ->name('admin.export_csv');
    Route::get('/admin/units', [AdminController::class, 'units'])->name('admin.units');
    Route::post('/admin/units/store', [AdminController::class, 'storeUnit'])->name('admin.units.store');
    Route::post('/admin/units/{id}/update-link', [AdminController::class, 'updateUnitLink'])->name('admin.units.updateLink');
});

Route::prefix('admin')->group(function () {
    Route::get('/home-settings', [AdminHomeSettingController::class, 'index'])
        ->name('admin.home_settings');
    Route::post('/home-settings/slider', [AdminHomeSettingController::class, 'storeSlider']);
    Route::delete('/home-settings/slider/{id}', [AdminHomeSettingController::class, 'deleteSlider']);
    Route::post('/home-settings/requirement', [AdminHomeSettingController::class, 'storeRequirement']);
    Route::delete('/home-settings/requirement/{id}', [AdminHomeSettingController::class, 'deleteRequirement']);
    Route::post('/home-settings/flow', [AdminHomeSettingController::class, 'storeFlow']);
    Route::delete('/home-settings/flow/{id}', [AdminHomeSettingController::class, 'deleteFlow']);
    Route::post('/home-settings/toggle-register-button', [AdminHomeSettingController::class, 'toggleRegisterButton']);
});

// Rute untuk User (Public)
Route::get('/pengumuman', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('/pengumuman/{id}', [AnnouncementController::class, 'show'])->name('announcements.show');

// Rute untuk Admin (Protected dengan middleware auth & admin)
Route::middleware('admin')->group(function () {
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
