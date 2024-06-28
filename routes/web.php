<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GemController;

Route::get('/', [GemController::class, 'index']);
Route::post('/submit', [GemController::class, 'store'])->name('gem.store');
Route::get('/report/{id}', [GemController::class, 'report'])->name('report');
Route::get('/gem/{id}', [GemController::class, 'showGemDetails'])->name('gem.details');
Route::get('/report/{id}/pdf', [GemController::class, 'generatePdf'])->name('report.pdf');
Route::get('/gems/{id}', [GemController::class, 'show'])->name('gems.show');
Route::get('/gems', [GemController::class, 'gemsIndex'])->name('gems.index');
Route::get('/gems/{id}/download', [GemController::class, 'downloadReport'])->name('gems.downloadReport');
Route::get('/gems/{id}/download-card', [GemController::class, 'downloadCard'])->name('gems.downloadCard');
