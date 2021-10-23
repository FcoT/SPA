<?php

use App\Http\Controllers\{NoteController, PageController};
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware('auth:sanctum')->group(
    function () {
        Route::get('dashboard', [PageController::class, 'dashboard'])->name('dashboard');
        Route::resource('notes', NoteController::class);
    }
);
