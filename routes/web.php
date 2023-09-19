<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// check datatable
Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/data', [UserController::class, 'data'])->name('data');

// check laravel pagination 
Route::get('/laravel/paginate/check', [UserController::class, 'paginateCheck'])->name('laravel.paginate.check');
Route::get('/refresh/log', [UserController::class, 'refreshLog']);
Route::get('/log', [UserController::class, 'log']);


