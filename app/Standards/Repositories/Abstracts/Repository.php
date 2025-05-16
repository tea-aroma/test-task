<?php

namespace App\Standards\Repositories\Abstracts;


use App\Standards\Data\Abstracts\Data;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


/**
 * Provides the base abstract logic for managing database tables.
 */
class Repository
{
    /**
     * The model class or instance.
     *
     * @var class-string<Model>|Model
     */
    protected string|Model $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = isset($this->model) ? new $model() : $model;
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
        return $this->model::query()->find($id);
    }

    /**
     * Creates a new record by the specified attributes.
     *
     * @param Data $attributes
     *
     * @return Model
     */
    public function create(Data $attributes): Model
    {
        return $this->model::query()->create($attributes->toArray());
    }

    /**
     * Updates a record by the specified attributes.
     *
     * @param Data     $attributes
     * @param int|null $id
     *
     * @return int
     */
    public function update(Data $attributes, int $id = null): int
    {
        $id = $attributes->id ?? $id;

        return $this->model::query()->where($this->getKeyName(), '=', $id)->update($attributes->toArray());
    }

    /**
     * Deletes a record by the specified id.
     *
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->model::query()->where($this->getKeyName(), '=', $id)->delete();
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
}
