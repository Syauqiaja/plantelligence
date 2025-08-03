<?php

use App\Livewire\EsaiDeskriptif;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/essai', EsaiDeskriptif::class)->name('essai.detail');

require __DIR__.'/auth.php';
