<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class CurrencyValuesModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'currency_values';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @return BelongsTo
     */
    public function currency_day(): BelongsTo
    {
        return $this->belongsTo(CurrencyDaysModel::class, 'currency_day_id');
    }

    /**
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(CurrencyDaysModel::class, 'currency_id');
    }
}
