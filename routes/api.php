<?php

use App\Http\Controllers\Api\CurrenciesController;
use App\Http\Controllers\Api\CurrenciesSettingsController;
use App\Http\Controllers\Api\SettingsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/currencies/list', [ CurrenciesController::class, 'list' ])->name('currencies.list');

Route::get('/currencies/record', [ CurrenciesController::class, 'record' ])->name('currencies.record');

Route::get('/settings/settings/list', [ SettingsController::class, 'list' ])->name('settings.settings.list');

Route::get('/settings/settings/get/{code}', [ SettingsController::class, 'get' ])->name('settings.settings.get');

Route::post('/settings/settings/update', [ SettingsController::class, 'update' ])->name('settings.settings.update');

Route::get('/settings/currencies/list', [ CurrenciesSettingsController::class, 'list' ])->name('settings.currencies.list');

Route::post('/settings/currencies/update', [ CurrenciesSettingsController::class, 'update' ])->name('settings.currencies.update');
