<?php

namespace App\Repositories;


use App\Models\CurrenciesModel;
use App\Standards\Repositories\Abstracts\Repository;
use Illuminate\Database\Eloquent\Model;


/**
 * @inheritDoc
 */
class CurrenciesRepository extends Repository
{
    protected string|Model $model = CurrenciesModel::class;
}
