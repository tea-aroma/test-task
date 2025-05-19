<?php

use App\Http\Controllers\CurrenciesSettingsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ HomeController::class, 'index' ])->name('home');

Route::get('settings/system', [ SettingsController::class, 'index' ])->name('settings.system');

Route::get('settings/currencies', [ CurrenciesSettingsController::class, 'index' ])->name('settings.currencies');
