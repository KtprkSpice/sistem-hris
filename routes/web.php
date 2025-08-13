<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KehadiranController;
use Illuminate\Auth\Middleware\Authenticate;

Route::get('/', function () {
    return redirect()->route('login');
});

// Untuk Auth Jangan lupa di tambahin di bootsrap auth dan juga jangan lupa buat middlewarenya seletah itu di mainnya atau file bladenya tambahin authnya
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard')
        ->middleware(['jabatan:HR,Developer,Sales,Finance']);
    Route::get('/dashboard/presences', [DashboardController::class, 'presences']);

    // Tugas
    // Untuk penggunaan resource sebenernya gak harus seperti ini ini dilakukan jika ada masalah pada penamaan table karena laravel akan automatis set plural dan singular karena done dan pending secara default breeze gak ada jadi kita harus masukin sendiri
    Route::resource('/tugas', TugasController::class)->parameters([
        'tugas' => 'tugas',
    ]);
    Route::get('/tugas/done/{id}', [TugasController::class, 'done'])
        ->name('tugas.done')
        ->middleware(['jabatan:HR,Developer,Sales,Finance']);
    Route::get('/tugas/pending/{id}', [TugasController::class, 'pending'])
        ->name('tugas.pending')
        ->middleware(['jabatan:HR,Developer,Sales,Finance']);

    // Karyawan
    Route::resource('/karyawan', KaryawanController::class)
        ->parameters(['karyawan' => 'karyawan'])
        ->middleware(['jabatan:HR']);

    // Departemen
    Route::resource('/departemen', DepartemenController::class)
        ->parameters([
            'departemen' => 'departemen',
        ])
        ->middleware(['jabatan:HR']);

    // Jabatan
    Route::resource('/jabatan', JabatanController::class)->middleware(['jabatan:HR']);

    // Gaji
    Route::resource('/gaji', GajiController::class)->middleware(['jabatan:HR,Developer,Sales,Finance']);

    // Kehadiran
    Route::resource('/kehadiran', KehadiranController::class)->middleware(['jabatan:HR,Developer,Sales,Finance']);

    // Handle Cuti
    Route::resource('/cuti', CutiController::class);
    Route::get('/cuti/confirm/{id}', [CutiController::class, 'confirm'])
        ->name('cuti.confirm')
        ->middleware(['jabatan:HR']);
    Route::get('/cuti/reject/{id}', [CutiController::class, 'reject'])
        ->name('cuti.reject')
        ->middleware(['jabatan:HR']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

require __DIR__ . '/auth.php';
