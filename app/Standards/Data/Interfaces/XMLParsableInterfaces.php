<?php

namespace App\Standards\Data\Interfaces;


use App\Standards\Data\Abstracts\Data;


/**
 * Interface for parsing XML.
 */
interface XMLParsableInterfaces
{
    /**
     * Creates a new instance by the specified XMLs.
     *
     * @param \SimpleXMLElement $xml
     * @param \SimpleXMLElement $attributes
     *
     * @return Data
     */
    public static function fromXML(\SimpleXMLElement $xml, \SimpleXMLElement $attributes): Data;
}
