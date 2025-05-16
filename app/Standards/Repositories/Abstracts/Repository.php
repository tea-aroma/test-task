<?php

namespace App\Standards\Repositories\Abstracts;


use App\Standards\Data\Abstracts\Data;
use App\Standards\Repositories\Interfaces\ReadableInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


/**
 * Provides the base abstract logic for managing database tables.
 */
class Repository implements ReadableInterface
{
    /**
     * The model class or instance.
     *
     * @var class-string<Model>|Model
     */
    protected string|Model $model;

    /**
     * @param Model|null $model
     */
    public function __construct(?Model $model = null)
    {
        $this->model = isset($this->model) ? new $this->model() : $model ?? new $this->model();
    }

    /**
     * Gets the primary key.
     *
     * @return string
     */
    protected function getKeyName(): string
    {
        return $this->model->getKeyName();
    }

    /**
     * Determines whether a record by the specified id exists.
     *
     * @param int $id
     *
     * @return bool
     */
    public function exists(int $id): bool
    {
        return static::find($id) !== null;
    }

    /**
     * Gets all records by the specified options.
     *
     * @param Data $options
     *
     * @return Collection<Model>
     */
    public function all(Data $options): Collection
    {
        return $this->model::all();
    }

    /**
     * Finds a record by the given id.
     *
     * @param int $id
     *
     * @return Model|null
     */
    public function find(int $id): ?Model
    {
        return $this->model->newQuery()->find($id);
    }
}
