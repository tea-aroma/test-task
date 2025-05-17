<?php

namespace App\Repositories;


use App\Data\Options\ViewCurrenciesOptionsData;
use App\Data\ViewCurrenciesData;
use App\Models\ViewCurrenciesModel;
use App\Standards\Data\Interfaces\OptionableDataInterface;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\ReadableInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


/**
 * @inheritDoc
 */
class ViewCurrenciesRepository extends Repository implements ReadableInterface
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

        $builder = $this->model->newQuery();

        if (isset($options->includes))
        {
            $builder->whereIn($options->includes_key ?? 'currency_char_code', explode(',', $options->includes));
        }

        if (isset($options->currency_day_date))
        {
            $builder->where('currency_day_date', '=', $options->currency_day_date);
        }

        return $builder->get()->map(fn (ViewCurrenciesModel $model) => ViewCurrenciesData::fromModel($model));
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
}
