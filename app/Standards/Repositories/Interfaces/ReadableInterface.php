<?php

namespace App\Standards\Repositories\Interfaces;


use App\Standards\Data\Abstracts\Data;
use App\Standards\Data\Interfaces\OptionableDataInterface;
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
     * @param OptionableDataInterface|null $options
     *
     * @return Collection<Model>|\Illuminate\Support\Collection<Data>
     */
    public function all(?OptionableDataInterface $options = null): Collection | \Illuminate\Support\Collection;

    /**
     * Finds a records by the specified id.
     *
     * @param int $id
     *
     * @return Model|null
     */
    public function find(int $id): ?Model;
}
