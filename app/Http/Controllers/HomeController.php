<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\View\View;


/**
 * Provides logic for home actions
 */
class HomeController extends Controller
{
    /**
     * Returns index page.
     *
     * @return View
     */
    public function index(): View
    {
        return view('home.index');
    }
}
