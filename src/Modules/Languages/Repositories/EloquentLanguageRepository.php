<?php

namespace Modules\Languages\Repositories;

use App\Extensions\Assert;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Support\Facades\DB;
use Modules\Languages\Filters\RealLanguageFilter;
use Modules\Languages\Entity\LanguageModel;
use Modules\Languages\Entity\Language;
use stdClass;

class EloquentLanguageRepository implements LanguageRepository
{
    public function save(Language $language): void
    {
        Assert::isInstanceOf($language, LanguageModel::class);
        /** @var LanguageModel $language */
        $language->save();
    }

    public function all(RealLanguageFilter $filter): CursorPaginator
    {
        return DB::table('languages')
            ->select()
            ->when($filter->name, function (Builder $query) use ($filter) {
                $query->where('name', '%' . $filter->name . '%');
            })
            ->when($filter->nativeName, function (Builder $query) use ($filter) {
                $query->where('native_name', '%' . $filter->nativeName . '%');
            })
            ->when($filter->code, function (Builder $query) use ($filter) {
                $query->where('code', '%' . $filter->code . '%');
            })
            ->orderBy('id')
            ->cursorPaginate();
    }

    public function get(int $id): ?stdClass
    {
        return DB::table('languages')
            ->select()
            ->first();
    }
}
