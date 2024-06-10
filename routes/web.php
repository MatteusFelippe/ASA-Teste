<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PacientesController;

Route::get('/',[HomeController::class,'index'])->name('home');

# CRUD Paciente
Route::resource('pacientes',PacientesController::class);