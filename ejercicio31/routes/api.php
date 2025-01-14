<?php

use App\Http\Controllers\AlumnoController;

Route::get('/alumnos', [AlumnoController::class, 'index']); // GET /api/alumnos
Route::get('/alumnos/{id}', [AlumnoController::class, 'show']); // GET /api/alumnos/{id}
Route::post('/alumnos', [AlumnoController::class, 'store']); // POST /api/alumnos
Route::put('/alumnos/{id}', [AlumnoController::class, 'update']); // PUT /api/alumnos/{id}
Route::delete('/alumnos/{id}', [AlumnoController::class, 'destroy']); // DELETE /api/alumnos/{id}
