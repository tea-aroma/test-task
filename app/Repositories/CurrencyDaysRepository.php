<?php

namespace App\Repositories;


use App\Models\CurrencyDaysModel;
use App\Standards\Repositories\Abstracts\Repository;
use Illuminate\Database\Eloquent\Model;


/**
 * @inheritDoc
 */
class CurrencyDaysRepository extends Repository
{
    protected string|Model $model = CurrencyDaysModel::class;
}
