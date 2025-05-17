<?php

namespace App\Standards\Repositories\Interfaces;


use App\Standards\Data\Interfaces\AttributableDataInterface;
use Illuminate\Database\Eloquent\Model;


/**
 * Interface for updating records.
 */
interface UpdatableInterface
{
    /**
     * Updates a record by the specified attributes.
     *
     * @param AttributableDataInterface $attributes
     *
     * @return Model
     */
    public function update(AttributableDataInterface $attributes): Model;
}
