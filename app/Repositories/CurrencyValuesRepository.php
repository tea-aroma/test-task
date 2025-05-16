<?php

namespace App\Repositories;


use App\Models\CurrencyValuesModel;
use App\Standards\Repositories\Abstracts\Repository;
use Illuminate\Database\Eloquent\Model;


/**
 * @inheritDoc
 */
class CurrencyValuesRepository extends Repository
{
    protected string|Model $model = CurrencyValuesModel::class;
}
