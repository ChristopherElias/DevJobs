<?php

use App\Http\Controllers\CandidatosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteController;
use Illuminate\Support\Facades\Route;



//Pagina Principal
Route::get('/', HomeController::class)->name('home');

//Panel de Administracion
Route::get('/dashboard', [VacanteController::class, 'index'])->middleware(['auth', 'verified', 'rol.reclutador'])->name('vacantes.index');  //Reclutador
Route::get('/vacantes/create', [VacanteController::class, 'create'])->middleware(['auth', 'verified', 'rol.reclutador'])->name('vacantes.create');        //Reclutador
Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'])->middleware(['auth', 'verified', 'rol.reclutador'])->name('vacantes.edit');    //Reclutador
Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show');   //Dev - Reclutador
Route::get('/candidatos/{vacante}', [CandidatosController::class, 'index'])->middleware(['auth', 'verified', 'rol.reclutador'])->name('candidatos.index'); //Reclutador

//Notificaciones
Route::get('/notificaciones', NotificacionController::class)->middleware(['auth', 'verified', 'rol.reclutador'])->name('notificaciones'); //Reclutador

//Perfil del Usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
