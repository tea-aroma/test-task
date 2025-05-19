<?php

namespace App\Data;


use App\Standards\Data\Abstracts\Data;
use App\Standards\Data\Interfaces\AttributableDataInterface;


/**
 * @inheritDoc
 */
class CurrenciesSettingsData extends Data implements AttributableDataInterface
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @var string
     */
    public string $currency_id;

    /**
     * @var int
     */
    public int $is_load;

    /**
     * @var int
     */
    public int $is_show;

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
