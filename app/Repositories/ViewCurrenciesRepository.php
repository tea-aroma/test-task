<?php

namespace App\Repositories;


use App\Models\ViewCurrenciesModel;
use App\Standards\Repositories\Abstracts\Repository;
use Illuminate\Database\Eloquent\Model;


/**
 * @inheritDoc
 */
class ViewCurrenciesRepository extends Repository
{
    /**
     * @inheritDoc
     *
     * @var string|Model
     */
    protected string|Model $model = ViewCurrenciesModel::class;
}
