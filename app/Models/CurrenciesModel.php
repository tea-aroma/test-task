<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CurrenciesModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'currencies';

    /**
     * @var string
     */
    protected $primaryKey = 'id';
}
