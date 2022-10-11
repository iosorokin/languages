<?php

namespace Modules\Domain\Languages\Repositories;

use App\Extensions\Assert;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Support\Facades\DB;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Entities\Language;
use Modules\Domain\Languages\Entities\LanguageModel;
use Modules\Domain\Languages\Filters\LanguageFilter;

class EloquentLanguageRepository implements LanguageRepository
{
    public function save(Language $language): void
    {
        Assert::isInstanceOf($language, LanguageModel::class);
        /** @var LanguageModel $language */
        $language->save();
    }

    public function all(LanguageFilter $filter): Languages
    {
        /** @var CursorPaginator $paginator */
        $paginator = DB::table('languages')
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

        $languages = new Languages($paginator->getCollection());
        dd($languages);
    }

    public function get(int $id): ?Language
    {
        return LanguageModel::find($id);
    }
}
