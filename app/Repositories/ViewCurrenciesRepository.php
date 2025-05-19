<?php

namespace App\Repositories;


use App\Data\Options\ViewCurrenciesOptionsData;
use App\Data\ViewCurrenciesData;
use App\Models\ViewCurrenciesModel;
use App\Standards\Data\Interfaces\OptionableDataInterface;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\FindableByCodeInterface;
use App\Standards\Repositories\Interfaces\FindableByOptionsInterface;
use App\Standards\Repositories\Interfaces\ReadableInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;


/**
 * @inheritDoc
 */
class ViewCurrenciesRepository extends Repository implements ReadableInterface, FindableByCodeInterface, FindableByOptionsInterface
{
    /**
     * @inheritDoc
     *
     * @var string|Model
     */
    protected string|Model $model = ViewCurrenciesModel::class;

    /**
     * @inheritDoc
     *
     * @param OptionableDataInterface|null $options
     *
     * @return Collection<ViewCurrenciesData>
     */
    public function all(?OptionableDataInterface $options = null): Collection
    {
        if (!is_a($options, ViewCurrenciesOptionsData::class))
        {
            throw new \LogicException('Options must be an instance of ViewCurrenciesOptionsData.');
        }

        return Cache::remember($this->toSha512($options), 3600, function () use ($options)
        {
            $builder = $this->model->newQuery();

            if (isset($options->includes))
            {
                $builder->whereIn($options->includes_key ?? 'currency_char_code', explode(',', $options->includes));
            }

            $builder->where('currency_day_date', '=', $options->currency_day_date ?? date('Y-m-d'));

            return $builder->get()->map(fn (ViewCurrenciesModel $model) => ViewCurrenciesData::fromModel($model));
        });
    }

    /**
     * @inheritDoc
     *
     * @param int $id
     *
     * @return ViewCurrenciesModel|null
     */
    public function find(int $id): ?ViewCurrenciesModel
    {
        return $this->model->newQuery()->find($id);
    }

    /**
     * @inheritDoc
     *
     * @param string $code
     * @param string $column
     *
     * @return Model|null
     */
    public function getByCode(string $code, string $column = 'date'): ?ViewCurrenciesModel
    {
        return $this->model->newQuery()->where($column, '=', $code)->first();
    }

    /**
     * @inheritDoc
     *
     * @param OptionableDataInterface $options
     *
     * @return ViewCurrenciesModel|null
     */
    public function getByOptions(OptionableDataInterface $options): ?ViewCurrenciesModel
    {
        if (!is_a($options, ViewCurrenciesOptionsData::class))
        {
            throw new \LogicException('Options must be an instance of ViewCurrenciesOptionsData.');
        }

        $builder = $this->model->newQuery();

        if (isset($options->currency_char_code))
        {
            $builder->where('currency_char_code', '=', $options->currency_char_code);
        }

        $date = $options->currency_day_date ?? date('Y-m-d');

        if ($options->is_yesterday)
        {
            $date = date('Y-m-d', strtotime($date . ' -1 day'));
        }

        $builder->whereDate('currency_day_date', '=', $date);

        return $builder->first();
    }
}
