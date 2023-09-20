<?php

use App\Http\Controllers\ResearchAndDevelopMentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


Route::get('/reboot', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    return "Application cache flushed";
});


// check datatable
Route::get('/', [ResearchAndDevelopMentController::class, 'index'])->name('index');
Route::get('/data', [ResearchAndDevelopMentController::class, 'data'])->name('data');

// check laravel pagination 
Route::get('/laravel/paginate/check', [ResearchAndDevelopMentController::class, 'paginateCheck'])->name('laravel.paginate.check');
Route::get('/refresh/log', [ResearchAndDevelopMentController::class, 'refreshLog']);
Route::get('/log', [ResearchAndDevelopMentController::class, 'log']);


// user log
Route::get('/user/log/view', [ResearchAndDevelopMentController::class, 'logView'])->name('user.log.view');
Route::get('/user/log/create', [ResearchAndDevelopMentController::class, 'logCreate'])->name('user.log.create');
