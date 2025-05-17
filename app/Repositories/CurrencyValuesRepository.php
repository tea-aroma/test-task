<?php

namespace App\Repositories;


use App\Data\CurrencyValuesData;
use App\Models\CurrencyValuesModel;
use App\Standards\Data\Interfaces\AttributableDataInterface;
use App\Standards\Data\Interfaces\OptionableDataInterface;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\ReadableInterface;
use App\Standards\Repositories\Interfaces\UpdatableOrCreatableInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


/**
 * @inheritDoc
 */
class CurrencyValuesRepository extends Repository implements ReadableInterface, UpdatableOrCreatableInterface
{
    /**
     * @inheritdoc
     *
     * @var string|Model
     */
    protected string|Model $model = CurrencyValuesModel::class;

    /**
     * @inheritDoc
     *
     * @param OptionableDataInterface|null $options
     *
     * @return Collection<CurrencyValuesData>
     */
    public function all(?OptionableDataInterface $options = null): Collection
    {
        return $this->model::all()->map(fn (CurrencyValuesModel $model) => CurrencyValuesData::fromModel($model));
    }

    /**
     * @inheritDoc
     *
     * @param int $id
     *
     * @return CurrencyValuesModel|null
     */
    public function find(int $id): ?CurrencyValuesModel
    {
        return $this->model->newQuery()->find($id);
    }

    /**
     * @inheritDoc
     *
     * @param AttributableDataInterface $attributes
     * @param AttributableDataInterface $values
     *
     * @return CurrencyValuesModel
     */
    public function updateOrCreate(AttributableDataInterface $attributes, AttributableDataInterface $values): CurrencyValuesModel
    {
        return $this->model->newQuery()->updateOrCreate($attributes->toArray(), $values->toArray());
    }
}
