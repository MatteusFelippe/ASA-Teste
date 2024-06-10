<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\AtendimentosController;

Route::get('/',[HomeController::class,'index'])->name('home');

# CRUD Paciente
Route::resource('pacientes',PacientesController::class);

# CRUD Medicos
Route::resource('medicos',MedicosController::class);

# CRUD Atendimentos
Route::resource('atendimentos',AtendimentosController::class);
