<?php

namespace App\Repositories;


use App\Models\SettingsModel;
use App\Standards\Data\Interfaces\AttributableDataInterface;
use App\Standards\Data\Interfaces\OptionableDataInterface;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\ReadableInterface;
use App\Standards\Repositories\Interfaces\UpdatableInterface;
use App\Standards\Repositories\Interfaces\UpdatableOrCreatableInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


/**
 * @inheritDoc
 */
class SettingsRepository extends Repository implements ReadableInterface, UpdatableOrCreatableInterface, UpdatableInterface
{
    /**
     * @inheritDoc
     *
     * @var string|Model
     */
    protected string|Model $model = SettingsModel::class;

    /**
     * @inheritDoc
     *
     * @param OptionableDataInterface|null $options
     *
     * @return Collection<SettingsModel>
     */
    public function all(?OptionableDataInterface $options = null): Collection
    {
        return $this->model::all();
    }

    /**
     * @inheritDoc
     *
     * @param int $id
     *
     * @return SettingsModel|null
     */
    public function find(int $id): ?SettingsModel
    {
        return $this->model->newQuery()->find($id);
    }

    /**
     * @inheritDoc
     *
     * @param AttributableDataInterface $attributes
     * @param AttributableDataInterface $values
     *
     * @return SettingsModel
     */
    public function updateOrCreate(AttributableDataInterface $attributes, AttributableDataInterface $values): SettingsModel
    {
        return $this->model->newQuery()->updateOrCreate($attributes->toArray(), $values->toArray());
    }

    /**
     * @inheritDoc
     *
     * @param AttributableDataInterface $attributes
     *
     * @return int
     */
    public function update(AttributableDataInterface $attributes): int
    {
        return $this->model->newQuery()->where('id', $attributes->id)->update($attributes->toArray());
    }
}
