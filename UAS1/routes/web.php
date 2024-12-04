<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa-index');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name("mahasiswa-create");
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name("mahasiswa-store");
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa-destroy');

require __DIR__ . '/auth.php';
