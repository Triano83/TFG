<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClinicaController;
use App\Http\Controllers\DatoController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/precios', App\Http\Controllers\PreciosController::class);
Route::get('/homenoadmin', [App\Http\Controllers\HomenoadminController::class, "index"])->name('homenoadmin');

//Clinica
Route::resource('/clinica', App\Http\Controllers\ClinicaController::class);
Route::get('/clinicas/show', [ClinicaController::class, 'show'])->name('clinicas.show');
Route::put('/clinicas/{clinica}', [ClinicaController::class, 'update'])->name('clinicas.update');
Route::delete('/clinicas/{clinica}', [ClinicaController::class, 'destroy'])->name('clinicas.destroy');

//Datos personales

Route::resource('/datos', App\Http\Controllers\DatoController::class);
Route::get('/datos/show', [DatoController::class, 'show'])->name('datos.show');
Route::put('/datos/{dato}', [DatoController::class, 'update'])->name('datos.update');
Route::delete('/datos/{dato}', [DatoController::class, 'destroy'])->name('datos.destroy');
