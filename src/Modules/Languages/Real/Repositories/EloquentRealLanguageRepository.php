<?php

namespace Modules\Languages\Real\Repositories;

use App\Contracts\Structures\Languages\RealLanguageStructure;
use App\Extensions\Assert;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Modules\Languages\Real\Filters\RealLanguageFilter;
use Modules\Languages\Real\Structures\RealLanguageModel;

class EloquentRealLanguageRepository implements RealLanguageRepository
{
    public function add(RealLanguageStructure $language): void
    {
        Assert::isInstanceOf($language, RealLanguageModel::class);
        /** @var RealLanguageModel $language */
        $language->save();
    }

    public function get(RealLanguageFilter $filter): Collection
    {
        $collection = RealLanguageModel::query()
            ->when($filter->name, function (Builder $query) use ($filter) {
                $query->where('name', '%' . $filter->name . '%');
            })
            ->when($filter->nativeName, function (Builder $query) use ($filter) {
                $query->where('nativeName', '%' . $filter->nativeName . '%');
            })
            ->when($filter->code, function (Builder $query) use ($filter) {
                $query->where('code', '%' . $filter->code . '%');
            })
            ->when($filter->paginator->limit, function (Builder $query) use ($filter) {
                $query->limit($filter->paginator->limit);
            })
            ->get();

        return $collection;
    }
}
