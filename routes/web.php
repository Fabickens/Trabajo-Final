<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CVController; // Importar el controlador de CVs
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Rutas de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de gestión de CVs
    Route::get('/cvs', [CVController::class, 'index'])->name('cvs.index'); // Listar CVs
    Route::get('/cvs/create', [CVController::class, 'create'])->name('cvs.create'); // Crear nuevo CV
    Route::post('/cvs', [CVController::class, 'store'])->name('cvs.store'); // Guardar CV
    Route::get('/cvs/{cv}/edit', [CVController::class, 'edit'])->name('cvs.edit'); // Editar CV
    Route::put('/cvs/{cv}', [CVController::class, 'update'])->name('cvs.update'); // Actualizar CV
    Route::delete('/cvs/{cv}', [CVController::class, 'destroy'])->name('cvs.destroy'); // Eliminar CV
    Route::get('/cvs/{cv}/download', [CVController::class, 'download'])->name('cvs.download');

});

require __DIR__.'/auth.php';
