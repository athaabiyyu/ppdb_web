<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PPDBController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;


Route::get('/', [PPDBController::class, 'index']);
Route::get('/daftar/{jenjang}', [PPDBController::class, 'pilihJenjang']);
Route::post('/pilih-lembaga', [PPDBController::class, 'pilihLembaga']);
Route::get('/form-data-pribadi/{id}/{jenjang}', [PPDBController::class, 'formDataPribadi'])->name('form.data.pribadi');
Route::post('/form-data-pribadi/store', [PPDBController::class, 'storeDataPribadi']);
Route::get('/form-ortu/{id}', [PPDBController::class, 'formOrtu'])->name('form.ortu');
Route::post('/form-ortu/store', [PPDBController::class, 'storeOrtu']);
Route::get('/form-dokumen/{id}', [PPDBController::class, 'formDokumen'])->name('form.dokumen');
Route::post('/form-dokumen/store', [PPDBController::class, 'storeDokumen'])->name('form.dokumen.store');
Route::get('/biodata/{id}', [PPDBController::class, 'biodata'])->name('biodata');
Route::get('/cetak/{id}', [PPDBController::class, 'cetak'])->name('cetak');

Route::get('/admin/login', [AdminAuthController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/{lembaga}', [AdminController::class, 'dataPerLembaga']);
    Route::get('/admin/{lembaga}/export/csv', [AdminController::class, 'exportCsv']);
});
