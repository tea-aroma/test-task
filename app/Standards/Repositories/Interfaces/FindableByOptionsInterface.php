<?php

namespace App\Standards\Repositories\Interfaces;


use App\Standards\Data\Interfaces\OptionableDataInterface;
use Illuminate\Database\Eloquent\Model;


/**
 * Interface for finding records by the specified options.
 */
interface FindableByOptionsInterface
{
    /**
     * Gets a record by the specified options.
     *
     * @param OptionableDataInterface $options
     *
     * @return Model|null
     */
    public function getByOptions(OptionableDataInterface $options): ?Model;
}
