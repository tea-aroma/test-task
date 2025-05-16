<?php

namespace App\Data;


use App\Standards\Data\Abstracts\Data;


/**
 * @inheritDoc
 */
readonly class CurrenciesData extends Data
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @var string
     */
    public string $valute_id;

    /**
     * @var string
     */
    public string $num_code;

    /**
     * @var string
     */
    public string $char_code;

    /**
     * @var string
     */
    public string $nominal;

    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $created_at;

    /**
     * @var string
     */
    public string $updated_at;
}
