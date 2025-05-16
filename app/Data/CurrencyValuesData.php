<?php

namespace App\Data;


use App\Standards\Data\Abstracts\Data;


/**
 * @inheritDoc
 */
readonly class CurrencyValuesData extends Data
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @var int
     */
    public int $currency_day_id;

    /**
     * @var int
     */
    public int $currency_id;

    /**
     * @var float
     */
    public float $value;

    /**
     * @var float
     */
    public float $vunit_rate;

    /**
     * @var int
     */
    public int $nominal;

    /**
     * @var string
     */
    public string $created_at;

    /**
     * @var string
     */
    public string $updated_at;
}
