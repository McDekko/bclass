<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'home']);
Route::get('/post/create', [BlogController::class, 'create']);
Route::get('/post/{id}', [BlogController::class, 'show']);
Route::get('/about', [BlogController::class, 'about']);
Route::post('/post', [BlogController::class, 'store']);
Route::get('/post/{id}/edit', [BlogController::class, 'edit']);
Route::put('/post/{id}', [BlogController::class, 'update']);
Route::delete('/post/{id}', [BlogController::class, 'destroy']);