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
Route::post('/ai-generate', [GenerateController::class, 'generate']);

// Route::get('/admin', [AdminController::class, 'index']);
Route::get('/project', [AdminController::class, 'index']);
Route::get('/contact-us', [AdminController::class, 'index']);
Route::get('/customer/overview', [AdminController::class, 'index']);