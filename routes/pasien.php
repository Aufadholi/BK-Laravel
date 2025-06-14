<?php

use App\Http\Controllers\pasien\RiwayatPeriksaController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->group(function () {
		// ...
		// Route pasien yang lain

    Route::prefix('riwayat-periksa')->group(function(){
        Route::get('/', [RiwayatPeriksaController::class, 'index'])->name('pasien.riwayat-periksa.index');
        Route::get('/{id}/detail', [RiwayatPeriksaController::class, 'detail'])->name('pasien.riwayat-periksa.detail');
        Route::get('/{id}/riwayat', [RiwayatPeriksaController::class, 'riwayat'])->name('pasien.riwayat-periksa.riwayat');
    });
});
