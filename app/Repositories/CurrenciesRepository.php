<?php

namespace App\Repositories;


use App\Data\CurrenciesData;
use App\Models\CurrenciesModel;
use App\Standards\Data\Interfaces\AttributableDataInterface;
use App\Standards\Data\Interfaces\OptionableDataInterface;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\FindableOrCreatableInterface;
use App\Standards\Repositories\Interfaces\ReadableInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


/**
 * @inheritDoc
 */
class CurrenciesRepository extends Repository implements ReadableInterface, FindableOrCreatableInterface
{
    /**
     * @inheritDoc
     *
     * @var string|Model
     */
    protected string|Model $model = CurrenciesModel::class;

    /**
     * @inheritDoc
     *
     * @param OptionableDataInterface|null $options
     *
     * @return Collection<CurrenciesData>
     */
    public function all(?OptionableDataInterface $options = null): \Illuminate\Support\Collection
    {
        return $this->model::all()->map(fn (CurrenciesModel $model) => CurrenciesData::fromModel($model));
    }

    /**
     * @inheritDoc
     *
     * @param int $id
     *
     * @return CurrenciesModel|null
     */
    public function find(int $id): ?CurrenciesModel
    {
        return $this->model->newQuery()->find($id);
    }

    /**
     * @inheritDoc
     *
     * @param AttributableDataInterface $attributes
     * @param AttributableDataInterface $values
     *
     * @return CurrenciesModel
     */
    public function findOrCreate(AttributableDataInterface $attributes, AttributableDataInterface $values): CurrenciesModel
    {
        return $this->model->newQuery()->firstOrCreate($attributes->toArray(), $values->toArray());
    }
}
