<?php

namespace App\Http\Controllers\Api;


use App\Data\CurrenciesSettingsData;
use App\Http\Controllers\Controller;
use App\Repositories\CurrenciesSettingsRepository;
use App\Repositories\ViewCurrenciesSettingsRepository;
use App\Standards\ApiResponse\ApiResponse;
use Illuminate\Http\JsonResponse;


/**
 * Provides logic for currencies-settings actions.
 */
class CurrenciesSettingsController extends Controller
{
    /**
     * Gets all records.
     *
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        return ApiResponse::fromArray([ 'data' => (new ViewCurrenciesSettingsRepository())->all()->toArray() ]);
    }

    /**
     * Updates a record.
     *
     * @return JsonResponse
     */
    public function update(): JsonResponse
    {
        $values = new CurrenciesSettingsData(request()->json()->all());

        (new CurrenciesSettingsRepository())->update($values);

        $record = (new ViewCurrenciesSettingsRepository())->find($values->id);

        return ApiResponse::fromArray([ 'message' => 'Updated Successfully.', 'record' => $record->toArray() ]);
    }
}
