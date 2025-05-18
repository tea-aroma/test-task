<?php

namespace App\Data;


use App\Standards\Data\Abstracts\Data;
use App\Standards\Data\Interfaces\AttributableDataInterface;


/**
 * @inheritDoc
 */
class CurrencyDaysData extends Data implements AttributableDataInterface
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
