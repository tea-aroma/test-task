<?php

namespace App\Data\Options;


use App\Data\ViewCurrenciesData;
use App\Standards\Data\Interfaces\OptionableDataInterface;
use App\Standards\Data\Interfaces\RequestParsableInterfaces;
use Illuminate\Http\Request;


/**
 * @inheritDoc
 */
class ViewCurrenciesOptionsData extends ViewCurrenciesData implements OptionableDataInterface, RequestParsableInterfaces
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
     * @var bool
     */
    public bool $is_yesterday = false;

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
