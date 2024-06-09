<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PacientesController;

/*Route::get('/', function () {
   return view('welcome');
});
*/

Route::get('/',[HomeController::class,'index'])->name('home');

#Paciente
Route::get('/pacientes',[PacientesController::class,'index'])->name('pacientes.index');
Route::get('/pacientes/create',[PacientesController::class,'create'])->name('pacientes.create');
Route::post('/pacientes',[PacientesController::class,'store'])->name('pacientes.store');
Route::post('/pacientes/{paciente}',[PacientesController::class,'show'])->name('pacientes.show');
Route::post('/pacientes/{paciente}/edit',[PacientesController::class,'edit'])->name('pacientes.edit');
Route::put('/pacientes/{paciente}',[PacientesController::class,'update'])->name('pacientes.update');
Route::delete('/pacientes/{paciente}',[PacientesController::class,'destroy'])->name('pacientes.destroy');
