<?php

namespace App\Http\Controllers\Api;

use App\Data\Options\ViewCurrenciesOptionsData;
use App\Http\Controllers\Controller;
use App\Repositories\ViewCurrenciesRepository;
use Illuminate\Http\JsonResponse;


/**
 * Provides logic for currencies API actions.
 */
class CurrenciesController extends Controller
{
    /**
     * Returns all records.
     *
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        $options = ViewCurrenciesOptionsData::fromRequest(request());

        return response()->json((new ViewCurrenciesRepository())->all($options)->toArray());
    }
}
