<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

// Route::get('/', [ContactController::class, 'index']);
Route::get('/', [ContactController::class, 'index'])->name('index');
// Route::post('/', [ContactController::class, 'index']);
Route::post('/add', [ContactController::class, 'add'])->name('add');
Route::post('/del', [ContactController::class, 'remove']);
Route::post('/edit', [ContactController::class, 'edit']);
Route::get('/system', [ContactController::class, 'system']);
Route::get('/search', [ContactController::class, 'search']);
Route::post('/complete', [ContactController::class, 'complete']);
Route::post('/edit', [ContactController::class, 'edit'])->name('edit');
Route::post('/thank', [ContactController::class, 'thank'])->name('thank');


// Route::post('/add', [ContactController::class, 'add']);
