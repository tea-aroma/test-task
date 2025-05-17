<?php

namespace App\Standards\Currencies\Classes;


use App\Data\CurrenciesData;
use App\Data\CurrencyDaysData;
use App\Data\CurrencyValuesData;
use App\Data\HttpCurrenciesData;
use App\Models\CurrenciesModel;
use App\Models\CurrencyDaysModel;
use App\Repositories\CurrenciesRepository;
use App\Repositories\CurrencyDaysRepository;
use App\Repositories\CurrencyValuesRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


/**
 * Provides help working with currencies.
 */
class Currencies
{
    /**
     * @var string
     */
    protected string $url;

    /**
     * @param string|null $url
     */
    public function __construct(?string $url = null)
    {
        $this->url = $url ?? env('CURRENCIES_URL');
    }

    /**
     * Gets a collection of currencies.
     *
     * @return Collection<HttpCurrenciesData>
     */
    public function getCurrencies(): Collection
    {
        $request = Http::get($this->url);

        $collection = new Collection();

        if ($request->ok())
        {
            $xml = simplexml_load_string($request->body());

            foreach ($xml->Valute as $currency)
            {
                $data = HttpCurrenciesData::fromXml($currency, $xml->attributes());

                $collection->push($data);
            }
        }

        return $collection;
    }

    /**
     * Saves the collection of currencies to a database.
     *
     * @return void
     */
    public function save(): void
    {
        DB::beginTransaction();

        $currencies = $this->getCurrencies();

        $currencyDay = $this->findOrCreateCurrencyDay($currencies->first());

        foreach ($currencies as $currency)
        {
            $modelCurrency = $this->findOrCreateCurrency($currency);

            $this->currencyValueProcessing($currency, $currencyDay->id, $modelCurrency->id);
        }

        DB::commit();
    }

    /**
     * Handles the process of the currency value.
     *
     * @param HttpCurrenciesData $currency
     * @param int                $currencyDayId
     * @param int                $currencyId
     *
     * @return void
     */
    public function currencyValueProcessing(HttpCurrenciesData $currency, int $currencyDayId, int $currencyId): void
    {
        $attributes = new CurrencyValuesData([ 'currency_day_id' => $currencyDayId, 'currency_id' => $currencyId ]);

        $values = new CurrencyValuesData([
            'currency_day_id' => $attributes->currency_day_id,
            'currency_id' => $attributes->currency_id,
            'value' => $currency->value,
            'vunit_rate' => $currency->vunit_rate,
            'nominal' => $currency->nominal,
        ]);

        (new CurrencyValuesRepository())->updateOrCreate($attributes, $values);
    }

    /**
     * Finds or creates a currency day record.
     *
     * @param HttpCurrenciesData $currency
     *
     * @return CurrencyDaysModel
     */
    protected function findOrCreateCurrencyDay(HttpCurrenciesData $currency): CurrencyDaysModel
    {
        $attributes = new CurrencyDaysData([ 'date' => date('Y-m-d', strtotime($currency->attribute_date)) ]);

        return (new CurrencyDaysRepository())->findOrCreate($attributes, $attributes);
    }

    /**
     * Finds or creates a currency record.
     *
     * @param HttpCurrenciesData $currency
     *
     * @return CurrenciesModel
     */
    protected function findOrCreateCurrency(HttpCurrenciesData $currency): CurrenciesModel
    {
        $attributes = new CurrenciesData([ 'valute_id' => $currency->valute_id ]);

        $values = new CurrenciesData($currency->toArray());

        return (new CurrenciesRepository())->findOrCreate($attributes, $values);
    }
}
