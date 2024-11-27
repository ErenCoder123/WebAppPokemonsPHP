<?php

use App\Http\Controllers\CoachController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('pokemon', [PokemonController::class, 'index'])->name('index');
Route::get('pokemon/create', [PokemonController::class, 'create'])->name('create');
Route::post('pokemon', [PokemonController::class, 'store'])->name('store');
Route::get('pokemon/{id}/edit', [PokemonController::class, 'edit'])->name('edit');
Route::put('pokemon/{id}', [PokemonController::class, 'update'])->name('update');
Route::delete('pokemon/{id}', [PokemonController::class, 'destroy'])->name('destroy');


Route::get('coaches', [CoachController::class, 'index'])->name('index');
Route::get('coaches/create', [CoachController::class, 'create'])->name('create');
Route::post('coaches', [CoachController::class, 'store'])->name('store');
Route::get('coaches/{id}/edit', [CoachController::class, 'edit'])->name('edit');
Route::put('coaches/{id}', [CoachController::class, 'update'])->name('update');
Route::delete('coaches/{id}', [CoachController::class, 'destroy'])->name('destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
