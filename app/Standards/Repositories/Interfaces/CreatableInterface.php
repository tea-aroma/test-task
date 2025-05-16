<?php

namespace App\Standards\Repositories\Interfaces;


use App\Standards\Data\Abstracts\Data;
use Illuminate\Database\Eloquent\Model;


/**
 * Interface for creating records.
 */
interface CreatableInterface
{
    /**
     * Creates a record by the specified attributes.
     *
     * @param Data $attributes
     *
     * @return Model
     */
    public function create(Data $attributes): Model;
}
