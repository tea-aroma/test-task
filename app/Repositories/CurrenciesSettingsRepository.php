<?php

namespace App\Repositories;


use App\Models\CurrenciesSettingsModel;
use App\Standards\Data\Interfaces\AttributableDataInterface;
use App\Standards\Data\Interfaces\OptionableDataInterface;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\FindableOrCreatableInterface;
use App\Standards\Repositories\Interfaces\ReadableInterface;
use App\Standards\Repositories\Interfaces\UpdatableInterface;
use App\Standards\Repositories\Interfaces\UpdatableOrCreatableInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;


/**
 * @inheritDoc
 */
class CurrenciesSettingsRepository extends Repository implements ReadableInterface, FindableOrCreatableInterface, UpdatableOrCreatableInterface, UpdatableInterface
{
    /**
     * @inheritDoc
     *
     * @var string|Model
     */
    protected string|Model $model = CurrenciesSettingsModel::class;

    /**
     * @inheritDoc
     *
     * @param OptionableDataInterface|null $options
     *
     * @return Collection<CurrenciesSettingsModel>
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
     * @return CurrenciesSettingsModel|null
     */
    public function find(int $id): ?CurrenciesSettingsModel
    {
        return $this->model->newQuery()->find($id);
    }

    /**
     * @inheritDoc
     *
     * @param AttributableDataInterface $attributes
     * @param AttributableDataInterface $values
     *
     * @return CurrenciesSettingsModel
     */
    public function findOrCreate(AttributableDataInterface $attributes, AttributableDataInterface $values): CurrenciesSettingsModel
    {
        return $this->model->newQuery()->firstOrCreate($attributes->toArray(), $values->toArray());
    }

    /**
     * @inheritDoc
     *
     * @param AttributableDataInterface $attributes
     * @param AttributableDataInterface $values
     *
     * @return CurrenciesSettingsModel
     */
    public function updateOrCreate(AttributableDataInterface $attributes, AttributableDataInterface $values): CurrenciesSettingsModel
    {
        Cache::tags('currencies')->flush();

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
        Cache::tags('currencies')->flush();

        return $this->model->newQuery()->where('id', $attributes->id)->update($attributes->toArray());
    }
}
