<?php

use App\Livewire\Home;
use App\Livewire\PageTest;
use Illuminate\Support\Facades\Route;

Route::get('/',  Home::class);

Route::get('/test',  PageTest::class);