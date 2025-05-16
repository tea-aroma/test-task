<?php

namespace App\Standards\Repositories\Interfaces;


use App\Standards\Data\Abstracts\Data;
use Illuminate\Database\Eloquent\Model;


/**
 * Interface for updating or creating records.
 */
interface UpdatableOrCreatableInterface
{
    /**
     * Updates or creates a record by the specified attributes.
     *
     * @param Data $attributes
     * @param Data $values
     *
     * @return Model
     */
    public function updateOrCreate(Data $attributes, Data $values): Model;
}
