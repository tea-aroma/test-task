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

    /**
     * @var string[]
     */
    protected $fillable =
        [
            'valute_id',
            'num_code',
            'char_code',
            'name',
        ];
}
