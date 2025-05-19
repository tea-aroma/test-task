<?php

namespace App\Http\Controllers\Api;

use App\Data\Options\ViewCurrenciesOptionsData;
use App\Http\Controllers\Controller;
use App\Repositories\ViewCurrenciesRepository;
use App\Standards\ApiResponse\ApiResponse;
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

        return ApiResponse::fromArray([ 'data'=> (new ViewCurrenciesRepository())->all($options)->toArray() ]);
    }

    /**
     * Returns a record.
     *
     * @return JsonResponse
     */
    public function record(): JsonResponse
    {
        $options = ViewCurrenciesOptionsData::fromRequest(request());

        $record = (new ViewCurrenciesRepository())->getByOptions($options);

        return ApiResponse::fromArray([ 'record' => $record->toArray() ?? null ]);
    }
}
