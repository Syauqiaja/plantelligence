<?php

use App\Http\Controllers\QuizController;
use App\Livewire\EsaiDeskriptif;
use App\Livewire\Home;
use App\Livewire\PageTest;
use Illuminate\Support\Facades\Route;

Route::view('/', 'components.layouts.app')->name('home');
Route::get('/test', PageTest::class)->name('test');
Route::get('/essai', EsaiDeskriptif::class)->name('essai.detail');
Route::post('/quiz/submit', [QuizController::class, 'submitQuiz'])->name('quiz.submit');

require __DIR__.'/auth.php';
