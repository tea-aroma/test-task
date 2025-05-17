<?php

namespace App\Standards\Data\Interfaces;


use App\Standards\Data\Abstracts\Data;
use Illuminate\Http\Request;


/**
 * Interface for creating instance from Request.
 */
interface RequestParsableInterfaces
{
    /**
     * Creates a new instance by the specified Request.
     *
     * @param Request $request
     *
     * @return Data
     */
    public static function fromRequest(Request $request): Data;
}
