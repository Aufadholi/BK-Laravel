<?php

use App\Http\Controllers\Pasien\JanjiPeriksa;
use App\Http\Controllers\Pasien\JanjiPeriksaController;
use App\Http\Controllers\ProfileController;
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
Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->group(function () {
    Route::get('/dashboard', function () {
        return view('dokter.dashboard');
    })->name('dokter.dashboard');
});

Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->group(function () {
    Route::get('/dashboard', function () {
        return view('pasien.dashboard');
    })->name('pasien.dashboard');
});

Route::prefix('janjiperiksa')->group(function(){
    Route::get('/',[JanjiPeriksaController::class,'index'])->name('pasien.janjiperiksa.index');
    Route::post('/',[JanjiPeriksaController::class,'store'])->name('pasien.janjiperiksa.store');
});

Route::patch('/dokter/memeriksa/{janji}/toggle-status', [\App\Http\Controllers\Dokter\MemeriksaController::class, 'toggleStatus'])->name('dokter.memeriksa.toggle-status');
Route::get('/dokter/obat/trash', [\App\Http\Controllers\Dokter\ObatController::class, 'trash'])->name('dokter.obat.trash');
Route::post('/dokter/obat/{id}/restore', [\App\Http\Controllers\Dokter\ObatController::class, 'restore'])->name('dokter.obat.restore');
Route::post('/dokter/obat/force-delete/{id}', [\App\Http\Controllers\Dokter\ObatController::class, 'forceDelete'])->name('dokter.obat.forceDelete');




require __DIR__.'/auth.php';
require __DIR__.'/pasien.php';
require __DIR__.'/dokter.php';
