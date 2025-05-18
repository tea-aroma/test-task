<?php

namespace App\Standards\Repositories\Abstracts;


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
     * Converts the given data to sha512.
     *
     * @param mixed $data
     *
     * @return string
     */
    protected function toSha512(mixed $data): string
    {
        return hash('sha512', json_encode($data));
    }
}
