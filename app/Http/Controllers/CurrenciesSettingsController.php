<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\View\View;


/**
 * Provides logic for currencies-settings actions.
 */
class CurrenciesSettingsController extends Controller
{
    /**
     * Returns index page.
     *
     * @return View
     */
    public function index(): View
    {
        return view('settings.currencies');
    }
}
