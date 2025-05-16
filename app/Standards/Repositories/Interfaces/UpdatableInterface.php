<?php

namespace App\Standards\Repositories\Interfaces;


use App\Standards\Data\Abstracts\Data;
use Illuminate\Database\Eloquent\Model;


/**
 * Interface for updating records.
 */
interface UpdatableInterface
{
    /**
     * Updates a record by the specified attributes.
     *
     * @param Data $attributes
     *
     * @return Model
     */
    public function update(Data $attributes): Model;
}
