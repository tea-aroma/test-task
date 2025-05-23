<?php

namespace App\Http\Controllers\Api;

use App\Data\SettingsData;
use App\Http\Controllers\Controller;
use App\Repositories\SettingsRepository;
use App\Standards\ApiResponse\ApiResponse;
use Illuminate\Http\JsonResponse;


/**
 * Provides logic for settings API actions.
 */
class SettingsController extends Controller
{
    /**
     * Gets all records.
     *
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        return ApiResponse::fromArray([ 'data' => (new SettingsRepository())->all()->toArray() ]);
    }

    /**
     * Gets a record by the specified key.
     *
     * @param string $key
     *
     * @return JsonResponse
     */
    public function get(string $key): JsonResponse
    {
        return ApiResponse::fromArray([ 'record' => (new SettingsRepository())->getByCode($key)->toArray() ]);
    }

    /**
     * Updates a record.
     *
     * @return JsonResponse
     */
    public function update(): JsonResponse
    {
        $attributes = new SettingsData(request()->json()->all());

        (new SettingsRepository())->update($attributes);

        return ApiResponse::fromArray([ 'message' => 'Updated Successfully.' ]);
    }
}
