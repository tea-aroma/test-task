<?php

namespace App\Data;


use App\Standards\Data\Abstracts\Data;
use App\Standards\Data\Interfaces\AttributableDataInterface;


/**
 * @inheritDoc
 */
class ViewCurrenciesData extends Data implements AttributableDataInterface
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
     * @var string
     */
    public string $currency_day_date;

    /**
     * @var int
     */
    public int $currency_id;

    /**
     * @var string
     */
    public string $currency_valute_id;

    /**
     * @var string
     */
    public string $currency_num_code;

    /**
     * @var string
     */
    public string $currency_char_code;

    /**
     * @var string
     */
    public string $currency_name;

    /**
     * @var int
     */
    public int $yesterday_nominal;

    /**
     * @var int
     */
    public int $nominal;

    /**
     * @var float
     */
    public float $yesterday_value;

    /**
     * @var float
     */
    public float $value;

    /**
     * @var float
     */
    public float $yesterday_vunit_rate;

    /**
     * @var float
     */
    public float $vunit_rate;

    /**
     * @var bool
     */
    public bool $currency_setting_id;

    /**
     * @var bool
     */
    public bool $currency_setting_is_load;

    /**
     * @var bool
     */
    public bool $currency_setting_is_show;

    /**
     * @var string
     */
    public string $created_at;

    /**
     * @var string
     */
    public string $updated_at;
}
