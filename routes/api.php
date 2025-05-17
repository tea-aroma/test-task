<?php

use App\Http\Controllers\Api\CurrenciesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/currencies/list', [ CurrenciesController::class, 'list' ])->name('currencies.list');
