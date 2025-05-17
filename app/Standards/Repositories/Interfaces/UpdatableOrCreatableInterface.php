<?php

namespace App\Standards\Repositories\Interfaces;


use App\Standards\Data\Interfaces\AttributableDataInterface;
use Illuminate\Database\Eloquent\Model;


/**
 * Interface for updating or creating records.
 */
interface UpdatableOrCreatableInterface
{
    /**
     * Updates or creates a record by the specified attributes.
     *
     * @param AttributableDataInterface $attributes
     * @param AttributableDataInterface $values
     *
     * @return Model
     */
    public function updateOrCreate(AttributableDataInterface $attributes, AttributableDataInterface $values): Model;
}
