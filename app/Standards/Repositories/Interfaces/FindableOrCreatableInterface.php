<?php

namespace App\Standards\Repositories\Interfaces;


use App\Standards\Data\Interfaces\AttributableDataInterface;
use Illuminate\Database\Eloquent\Model;


/**
 * Interface for finding or creating records.
 */
interface FindableOrCreatableInterface
{
    /**
     * Finds a record, if a record does not exist, creates a new record by the specified values.
     *
     * @param AttributableDataInterface $attributes
     * @param AttributableDataInterface $values
     *
     * @return Model
     */
    public function findOrCreate(AttributableDataInterface $attributes, AttributableDataInterface $values): Model;
}
