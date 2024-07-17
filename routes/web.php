<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\GenerateController;
use App\Http\Controllers\AdminController;

Route::get('/ai-generate/{view}', [GenerateController::class, 'index']);
// Route::get('/admin', [AdminController::class, 'index']);