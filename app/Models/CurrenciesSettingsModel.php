<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class CurrenciesSettingsModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'currencies_settings';

    /**
     * @var string[]
     */
    protected $fillable =
        [
            'currency_id',
            'load_from_api',
            'show_in_widget',
        ];

    /**
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(CurrencyDaysModel::class, 'currency_id');
    }
}
