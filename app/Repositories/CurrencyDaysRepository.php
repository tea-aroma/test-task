<?php

namespace App\Repositories;


use App\Data\CurrencyDaysData;
use App\Models\CurrencyDaysModel;
use App\Standards\Data\Interfaces\AttributableDataInterface;
use App\Standards\Data\Interfaces\OptionableDataInterface;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\FindableByDateInterface;
use App\Standards\Repositories\Interfaces\FindableOrCreatableInterface;
use App\Standards\Repositories\Interfaces\ReadableInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


/**
 * @inheritDoc
 */
class CurrencyDaysRepository extends Repository implements ReadableInterface, FindableOrCreatableInterface, FindableByDateInterface
{
    /**
     * @inheritDoc
     *
     * @var string|Model
     */
    protected string|Model $model = CurrencyDaysModel::class;

    /**
     * @inheritDoc
     *
     * @param OptionableDataInterface|null $options
     *
     * @return Collection<CurrencyDaysData>
     */
    public function all(?OptionableDataInterface $options = null): Collection
    {
        return $this->model::all()->map(fn (CurrencyDaysModel $model) => CurrencyDaysData::fromModel($model));
    }

    /**
     * @inheritDoc
     *
     * @param int $id
     *
     * @return CurrencyDaysModel|null
     */
    public function find(int $id): ?CurrencyDaysModel
    {
        return $this->model->newQuery()->find($id);
    }

    /**
     * @inheritDoc
     *
     * @param AttributableDataInterface $attributes
     * @param AttributableDataInterface $values
     *
     * @return CurrencyDaysModel
     */
    public function findOrCreate(AttributableDataInterface $attributes, AttributableDataInterface $values): CurrencyDaysModel
    {
        return $this->model->newQuery()->firstOrCreate($attributes->toArray(), $values->toArray());
    }

    /**
     * @inheritDoc
     *
     * @param string $date
     * @param string $column
     *
     * @return CurrencyDaysModel|null
     */
    public function getByDate(string $date, string $column = 'date'): ?CurrencyDaysModel
    {
        return $this->model->newQuery()->whereDate($column, $date)->first();
    }
}
