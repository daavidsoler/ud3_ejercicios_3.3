<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\NotaController;

Route::get('/alumnos', [AlumnoController::class, 'index']);
Route::get('/alumnos/{id}', [AlumnoController::class, 'show']); 
Route::post('/alumnos', [AlumnoController::class, 'store']); 
Route::put('/alumnos/{id}', [AlumnoController::class, 'update']); 
Route::delete('/alumnos/{id}', [AlumnoController::class, 'destroy']); 

Route::get('/notas', [NotaController::class, 'index']); 
Route::get('/notas/{id}', [NotaController::class, 'show']);
Route::post('/notas', [NotaController::class, 'store']); 
Route::put('/notas/{id}', [NotaController::class, 'update']); 
Route::delete('/notas/{id}', [NotaController::class, 'destroy']); 
