<?php

namespace App\Standards\Repositories\Interfaces;


use App\Standards\Data\Abstracts\Data;
use Illuminate\Database\Eloquent\Model;


/**
 * Interface for finding or creating records.
 */
interface FindableOrCreatableInterface
{
    /**
     * Finds a record, if a record does not exist, creates a new record by the specified values.
     *
     * @param Data $attributes
     * @param Data $values
     *
     * @return Model
     */
    public function findOrCreate(Data $attributes, Data $values): Model;
}
