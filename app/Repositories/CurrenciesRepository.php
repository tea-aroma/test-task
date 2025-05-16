<?php

namespace App\Repositories;


use App\Models\CurrenciesModel;
use App\Standards\Data\Abstracts\Data;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\FindableOrCreatableInterface;
use Illuminate\Database\Eloquent\Model;


/**
 * @inheritDoc
 */
class CurrenciesRepository extends Repository implements FindableOrCreatableInterface
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
     * @param Data $attributes
     * @param Data $values
     *
     * @return CurrenciesModel
     */
    public function findOrCreate(Data $attributes, Data $values): CurrenciesModel
    {
        return $this->model->newQuery()->firstOrCreate($attributes->toArray(), $values->toArray());
    }
}
