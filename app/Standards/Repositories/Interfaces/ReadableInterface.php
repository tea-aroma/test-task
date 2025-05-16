<?php

namespace App\Standards\Repositories\Interfaces;


use App\Standards\Data\Abstracts\Data;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


/**
 * Interface for reading records.
 */
interface ReadableInterface
{
    /**
     * Gets all records by the specified options.
     *
     * @param Data|null $options
     *
     * @return Collection<Model>
     */
    public function all(?Data $options = null): Collection;

    /**
     * Finds a records by the specified id.
     *
     * @param int $id
     *
     * @return Model|null
     */
    public function find(int $id): ?Model;
}
