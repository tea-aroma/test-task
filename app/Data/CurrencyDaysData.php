<?php

namespace App\Data;


use App\Standards\Data\Abstracts\Data;


/**
 * @inheritDoc
 */
readonly class CurrencyDaysData extends Data
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @var string
     */
    public string $date;

    /**
     * @var string
     */
    public string $created_at;

    /**
     * @var string
     */
    public string $updated_at;
}
