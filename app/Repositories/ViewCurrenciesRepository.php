<?php

namespace App\Repositories;


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
        return $this->model::all()->map(fn (ViewCurrenciesModel $model) => ViewCurrenciesData::fromModel($model));
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
