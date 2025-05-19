<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ViewCurrenciesSettingsModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'v_currencies_settings';

    /**
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(CurrencyDaysModel::class, 'currency_id');
    }
}
