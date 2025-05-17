<?php

namespace App\Data\Options;


use App\Data\ViewCurrenciesData;
use App\Standards\Data\Interfaces\OptionableDataInterface;
use App\Standards\Data\Interfaces\RequestParsableInterfaces;
use Illuminate\Http\Request;


/**
 * @inheritDoc
 */
readonly class ViewCurrenciesOptionsData extends ViewCurrenciesData implements OptionableDataInterface, RequestParsableInterfaces
{
    /**
     * @var string|null
     */
    public ?string $includes;

    /**
     * @var string|null
     */
    public ?string $includes_key;

    /**
     * @inheritDoc
     *
     * @param Request $request
     *
     * @return $this
     */
    public static function fromRequest(Request $request): static
    {
        return self::fromArray($request->all());
    }
}
