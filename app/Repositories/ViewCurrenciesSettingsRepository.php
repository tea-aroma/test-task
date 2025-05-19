<?php

namespace App\Repositories;


use App\Models\CurrenciesSettingsModel;
use App\Models\ViewCurrenciesSettingsModel;
use App\Standards\Data\Interfaces\OptionableDataInterface;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\ReadableInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


/**
 * @inheritDoc
 */
class ViewCurrenciesSettingsRepository extends Repository implements ReadableInterface
{
    /**
     * @inheritDoc
     *
     * @var string|Model
     */
    protected string|Model $model = ViewCurrenciesSettingsModel::class;

    /**
     * @inheritDoc
     *
     * @param OptionableDataInterface|null $options
     *
     * @return Collection<CurrenciesSettingsModel>
     */
    public function all(?OptionableDataInterface $options = null): Collection
    {
        return $this->model::all();
    }

    /**
     * @inheritDoc
     *
     * @param int $id
     *
     * @return ViewCurrenciesSettingsModel|null
     */
    public function find(int $id): ?ViewCurrenciesSettingsModel
    {
        return $this->model->newQuery()->find($id);
    }
}
