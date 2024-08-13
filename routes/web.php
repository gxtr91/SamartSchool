<?php

use App\Http\Controllers\CandidatosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('pages.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('index_dash');
    /*Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    */
    Route::prefix('candidatos')->name('candidatos.')->group(function () {
        Route::get('/', CandidatosController::class)->name('index');
        Route::get('/json', [CandidatosController::class, 'indexJson'])->name('indexJson');
        Route::post('updtst', [CandidatosController::class, 'updateState'])->name('updateState');
        Route::get('/excel-candidatos', [CandidatosController::class, 'dwnExcel'])->name('dwn-candidatos');
        Route::get('/report-view/{id}', [CandidatosController::class,'show'])->name('report-view');

    });
});

require __DIR__.'/auth.php';