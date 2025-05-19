<?php

namespace App\Http\Middleware;

use App\Standards\Currencies\Classes\Currencies;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CurrenciesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currencies = new Currencies();

        if (!$currencies->hasCurrencyDay(date('Y-m-d')))
        {
            $currencies->save();
        }

        return $next($request);
    }
}
