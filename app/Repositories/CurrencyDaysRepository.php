<?php

namespace App\Repositories;


use App\Models\CurrencyDaysModel;
use App\Standards\Data\Abstracts\Data;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\FindableOrCreatableInterface;
use Illuminate\Database\Eloquent\Model;


/**
 * @inheritDoc
 */
class CurrencyDaysRepository extends Repository implements FindableOrCreatableInterface
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
}
