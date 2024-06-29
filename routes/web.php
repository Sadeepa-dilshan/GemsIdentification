<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GemController;
use App\Http\Controllers\ProfileController;

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
    Route::get('/', [GemController::class, 'index']);
    Route::post('/submit', [GemController::class, 'store'])->name('gem.store');
    Route::get('/report/{id}', [GemController::class, 'report'])->name('report');
    Route::get('/gem/{id}', [GemController::class, 'showGemDetails'])->name('gem.details');
    Route::get('/report/{id}/pdf', [GemController::class, 'generatePdf'])->name('report.pdf');
    Route::get('/gems/{id}', [GemController::class, 'show'])->name('gems.show');
    Route::get('/gems', [GemController::class, 'gemsIndex'])->name('gems.index');
    Route::get('/gems/{id}/download', [GemController::class, 'downloadReport'])->name('gems.downloadReport');
    Route::get('/gems/{id}/download-card', [GemController::class, 'downloadCard'])->name('gems.downloadCard');
});

require __DIR__.'/auth.php';
