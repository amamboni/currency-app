<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::as('home.')
    ->controller(HomeController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });
