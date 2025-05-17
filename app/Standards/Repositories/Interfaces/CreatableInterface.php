<?php

namespace App\Standards\Repositories\Interfaces;


use App\Standards\Data\Interfaces\AttributableDataInterface;
use Illuminate\Database\Eloquent\Model;


/**
 * Interface for creating records.
 */
interface CreatableInterface
{
    /**
     * Creates a record by the specified attributes.
     *
     * @param AttributableDataInterface $attributes
     *
     * @return Model
     */
    public function create(AttributableDataInterface $attributes): Model;
}
