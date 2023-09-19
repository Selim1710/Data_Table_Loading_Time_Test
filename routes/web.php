<?php

use App\Http\Controllers\ResearchAndDevelopMentController;
use Illuminate\Support\Facades\Route;

// check datatable
Route::get('/', [ResearchAndDevelopMentController::class, 'index'])->name('index');
Route::get('/data', [ResearchAndDevelopMentController::class, 'data'])->name('data');

// check laravel pagination 
Route::get('/laravel/paginate/check', [ResearchAndDevelopMentController::class, 'paginateCheck'])->name('laravel.paginate.check');
Route::get('/refresh/log', [ResearchAndDevelopMentController::class, 'refreshLog']);
Route::get('/log', [ResearchAndDevelopMentController::class, 'log']);



