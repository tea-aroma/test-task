<?php

namespace App\Data;



use App\Standards\Data\Abstracts\Data;
use App\Standards\Data\Interfaces\AttributableDataInterface;
use App\Standards\Data\Interfaces\XMLParsableInterfaces;


/**
 * @inheritDoc
 */
readonly class HttpCurrenciesData extends Data implements AttributableDataInterface, XMLParsableInterfaces
{
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
     * @var int
     */
    public int $nominal;

    /**
     * @var string
     */
    public string $name;

    /**
     * @var float
     */
    public float $value;

    /**
     * @var float
     */
    public float $vunit_rate;

    /**
     * @var string
     */
    public string $attribute_date;

    /**
     * @var string
     */
    public string $attribute_name;

    /**
     * @inheritDoc
     *
     * @param \SimpleXMLElement $xml
     * @param \SimpleXMLElement $attributes
     *
     * @return HttpCurrenciesData
     */
    public static function fromXml(\SimpleXMLElement $xml, \SimpleXMLElement $attributes): HttpCurrenciesData
    {
        $array =
            [
                'valute_id' => (string) $xml->attributes()->ID,
                'char_code' => (string) $xml->CharCode,
                'num_code' => (string) $xml->NumCode,
                'nominal' => (int) $xml->Nominal,
                'name' => (string) $xml->Name,
                'value' => (float) str_replace(',', '.', $xml->Value),
                'vunit_rate' => (float) str_replace(',', '.', $xml->VunitRate),
                'attribute_date' => (string) $attributes->Date,
                'attribute_name' => (string) $attributes->name,
            ];

        return self::fromArray($array);
    }
}
