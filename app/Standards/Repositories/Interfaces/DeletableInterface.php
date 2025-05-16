<?php

namespace App\Standards\Repositories\Interfaces;


use Illuminate\Database\Eloquent\Model;


/**
 * Interface for deleting records.
 */
interface DeletableInterface
{
    /**
     * Deletes a record by the specified id.
     *
     * @param int $id
     *
     * @return Model
     */
    public function delete(int $id): Model;
}
