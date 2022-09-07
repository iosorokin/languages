<?php

namespace Modules\Languages\Real\Repositories;

use App\Contracts\Structures\Languages\RealLanguageStructure;
use App\Extensions\Assert;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Languages\Real\Filters\RealLanguageFilter;
use Modules\Languages\Real\Structures\RealLanguageModel;
use stdClass;

class EloquentRealLanguageRepository implements RealLanguageRepository
{
    public function add(RealLanguageStructure $language): void
    {
        Assert::isInstanceOf($language, RealLanguageModel::class);
        /** @var RealLanguageModel $language */
        $language->save();
    }

    public function all(RealLanguageFilter $filter): CursorPaginator
    {
        return DB::table('real_languages')
            ->select()
            ->when($filter->name, function (Builder $query) use ($filter) {
                $query->where('name', '%' . $filter->name . '%');
            })
            ->when($filter->nativeName, function (Builder $query) use ($filter) {
                $query->where('nativeName', '%' . $filter->nativeName . '%');
            })
            ->when($filter->code, function (Builder $query) use ($filter) {
                $query->where('code', '%' . $filter->code . '%');
            })
            ->orderBy('id')
            ->cursorPaginate();
    }

    public function get(int $id): stdClass
    {
        return DB::table('real_languages')
            ->select()
            ->first();
    }
}
