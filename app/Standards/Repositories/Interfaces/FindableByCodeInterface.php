<?php

namespace App\Standards\Repositories\Interfaces;


use Illuminate\Database\Eloquent\Model;


/**
 * Interface for finding records by the specified code.
 */
interface FindableByCodeInterface
{
    /**
     * Gets a record by the specified code.
     *
     * @param string $code
     * @param string $column
     *
     * @return Model|null
     */
    public function getByCode(string $code, string $column = 'date'): ?Model;
}
