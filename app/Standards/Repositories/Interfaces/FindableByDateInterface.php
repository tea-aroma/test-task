<?php

namespace App\Standards\Repositories\Interfaces;


use Illuminate\Database\Eloquent\Model;


/**
 * Interface for finding records by the date.
 */
interface FindableByDateInterface
{
    /**
     * Gets a record by the specified date.
     *
     * @param string $date
     * @param string $column
     *
     * @return Model|null
     */
    public function getByDate(string $date, string $column = 'date'): ?Model;
}
