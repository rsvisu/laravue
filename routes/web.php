<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Home
Route::get('/', function () {
    // Si esta autenticado devolvemos esta vista
    if (auth()->check()) {
        return Inertia::render('WelcomeAuth');

    }
    // Si no, esta otra
    return Inertia::render('WelcomeGuest');
});

// Auth
Route::middleware('auth')->group(function () {
    // Cronometro
    Route::get('/crono', fn() => Inertia::render('Cronometero'))->name('cronometro');
    // Proyectos
    Route::resource('/projects', ProjectController::class);
    Route::post('/projects/seed', [ProjectController::class, 'seed'])->name('projects.seed');
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Dashboard
    Route::get('/dashboard', function () {
        return redirect('/');
        // return Inertia::render('Dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
