<?php

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/blog', [HomeController::class, 'index'])
    ->name('blog');
