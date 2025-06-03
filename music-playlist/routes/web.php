<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicController;

Route::get('/', function () {
    return redirect()->route('playlist.index');
});
Route::get('/dashboard', function () {
    // Você pode redirecionar para a playlist, ou criar uma página simples
    return redirect()->route('playlist.index');
})->name('dashboard');

Route::get('/playlist', [MusicController::class, 'index'])->name('playlist.index');
Route::get('/playlist/create', [MusicController::class, 'create'])->name('playlist.create');
Route::post('/playlist', [MusicController::class, 'store'])->name('playlist.store');
Route::get('/playlist/{id}/edit', [MusicController::class, 'edit'])->name('playlist.edit');
Route::put('/playlist/{id}', [MusicController::class, 'update'])->name('playlist.update');
Route::delete('/playlist/{id}', [MusicController::class, 'destroy'])->name('playlist.destroy');
