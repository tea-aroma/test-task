<?php

namespace App\Standards\Data\Abstracts;


/**
 * Provides help working for data properties.
 */
readonly abstract class Data
{
    /**
     * @param array $values
     */
    public function __construct(array $values)
    {
        $this->fill($values);
    }

    /**
     * Gets the all properties by the specified filters.
     *
     * @param int|null $filter
     *
     * @return \ReflectionProperty[]
     */
    protected function getProperties(?int $filter = \ReflectionProperty::IS_PUBLIC): array
    {
        return (new \ReflectionClass($this))->getProperties($filter);
    }

    /**
     * Creates a new instance by the specified array.
     *
     * @param array $values
     *
     * @return static
     */
    public static function fromArray(array $values): static
    {
        return new static($values);
    }

    /**
     * Converts this instance to array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $array = [];

        foreach ((new \ReflectionClass($this))->getProperties() as $property)
        {
            if (!$property->isInitialized($this))
            {
                continue;
            }

            $array[ $property->getName() ] = $property->getValue($this);
        }

        return $array;
    }

    /**
     * Fills this instance by the specified values.
     *
     * @param array $values
     *
     * @return $this
     */
    public function fill(array $values): static
    {
        foreach ($this->getProperties() as $property)
        {
            if (!isset($values[ $property->getName() ]))
            {
                continue;
            }

            $property->setValue($this, $values[ $property->getName() ]);
        }

        return $this;
    }
}
