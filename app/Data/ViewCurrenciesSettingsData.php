<?php

namespace App\Data;


use App\Standards\Data\Abstracts\Data;
use App\Standards\Data\Interfaces\AttributableDataInterface;


/**
 * @inheritDoc
 */
class ViewCurrenciesSettingsData extends Data implements AttributableDataInterface
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @var int
     */
    public string $currency_id;

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
     * @var bool
     */
    public bool $is_load;

    /**
     * @var bool
     */
    public bool $is_show;

    /**
     * @var string
     */
    public string $description;

    /**
     * @var string
     */
    public string $created_at;

    /**
     * @var string
     */
    public string $updated_at;
}
