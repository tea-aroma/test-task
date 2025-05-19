<?php

namespace App\Data;


use App\Standards\Data\Abstracts\Data;
use App\Standards\Data\Interfaces\AttributableDataInterface;


/**
 * @inheritDoc
 */
class SettingsData extends Data implements AttributableDataInterface
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @var string
     */
    public string $key;

    /**
     * @var string
     */
    public string $value;

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
