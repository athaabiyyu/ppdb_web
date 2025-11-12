<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('main');
});

Route::get('/sma1', function() {
    return view('sma1/main');
})->name('sma1.main');

Route::get('/sma2', function() {
    return view('sma2/main');
})->name('sma2.main');

Route::get('/sma3', function() {
    return view('sma3/main');
})->name('sma3.main');