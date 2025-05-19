<?php

namespace App\Standards\ApiResponse;


use Illuminate\Http\JsonResponse;


/**
 * Provides the standard for the api response.
 */
class ApiResponse
{
    /**
     * @var string
     */
    public string $message = '';

    /**
     * @var int
     */
    public int $status = 200;

    /**
     * @var array|object|null
     */
    public array | object | null $data = null;

    /**
     * @var array|object|null
     */
    public array | object | null $record = null;

    /**
     * @param array $array
     */
    private function __construct(array $array)
    {
        foreach ($array as $key => $value)
        {
            if (empty($value))
            {
                continue;
            }

            $this->$key = $value;
        }
    }

    /**
     * Converts current instance to JsonResponse.
     *
     * @return JsonResponse
     */
    public function toJsonResponse(): JsonResponse
    {
        return new JsonResponse([ 'message' => $this->message, 'status' => $this->status, 'data' => $this->data, 'record' => $this->record ]);
    }

    /**
     * Creates an instance by the specified array and return a JsonResponse.
     *
     * @param array $array
     *
     * @return JsonResponse
     */
    public static function fromArray(array $array): JsonResponse
    {
        return (new static($array))->toJsonResponse($array);
    }
}
