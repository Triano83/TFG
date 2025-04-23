<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClinicaController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/precios', App\Http\Controllers\PreciosController::class);
Route::get('/homenoadmin', [App\Http\Controllers\HomenoadminController::class, "index"])->name('homenoadmin');

Route::resource('/clinica', App\Http\Controllers\ClinicaController::class);
Route::get('/clinicas/show', [ClinicaController::class, 'show'])->name('clinicas.show');
Route::put('/clinicas/{clinica}', [ClinicaController::class, 'update'])->name('clinicas.update');
Route::delete('/clinicas/{clinica}', [ClinicaController::class, 'destroy'])->name('clinicas.destroy');

