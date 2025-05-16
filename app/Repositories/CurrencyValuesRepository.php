<?php

namespace App\Repositories;


use App\Models\CurrencyValuesModel;
use App\Standards\Data\Abstracts\Data;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\UpdatableOrCreatableInterface;
use Illuminate\Database\Eloquent\Model;


/**
 * @inheritDoc
 */
class CurrencyValuesRepository extends Repository implements UpdatableOrCreatableInterface
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
     * @param Data $attributes
     * @param Data $values
     *
     * @return CurrencyValuesModel
     */
    public function updateOrCreate(Data $attributes, Data $values): CurrencyValuesModel
    {
        return $this->model->newQuery()->updateOrCreate($attributes->toArray(), $values->toArray());
    }
}
