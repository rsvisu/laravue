<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Clase
Route::get('/crono', fn() => Inertia::render('Cronometero'))->name('cronometro');

// Default
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Dashboard
Route::get('/dashboard', function () {
    return redirect('/');
    // return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Projects
Route::resource('/projects', \App\Http\Controllers\ProjectController::class);
Route::post('/projects/seed', [\App\Http\Controllers\ProjectController::class, 'seed'])->name('projects.seed');

// Auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
