<?php

namespace App\Repositories;


use App\Models\CurrencyDaysModel;
use App\Standards\Data\Abstracts\Data;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\FindableByDateInterface;
use App\Standards\Repositories\Interfaces\FindableOrCreatableInterface;
use Illuminate\Database\Eloquent\Model;


/**
 * @inheritDoc
 */
class CurrencyDaysRepository extends Repository implements FindableOrCreatableInterface, FindableByDateInterface
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
     * @param Data $attributes
     * @param Data $values
     *
     * @return CurrencyDaysModel
     */
    public function findOrCreate(Data $attributes, Data $values): CurrencyDaysModel
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
