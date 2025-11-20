<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'home']);
Route::get('/post/{id}', [BlogController::class, 'show']);
Route::get('/about', [BlogController::class, 'about']);

