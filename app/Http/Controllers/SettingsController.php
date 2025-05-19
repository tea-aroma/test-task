<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\View\View;


/**
 * Provides logic for settings actions.
 */
class SettingsController extends Controller
{
    /**
     * Returns index page.
     *
     * @return View
     */
    public function index(): View
    {
        return view('settings.settings');
    }
}
