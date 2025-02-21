<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/precios', App\Http\Controllers\PreciosController::class);
Route::get('/homenoadmin', [App\Http\Controllers\HomenoadminController::class, "index"])->name('homenoadmin');
