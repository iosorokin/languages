<?php

namespace Modules\Domain\Languages\Repositories;

use App\Extensions\Assert;
use Core\Services\Pagination\CursorPaginator;
use Illuminate\Contracts\Pagination\CursorPaginator as EloquentCursorPaginator;
use Illuminate\Database\Query\Builder;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Languages\Structures\LanguageModel;
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
        /** @var EloquentCursorPaginator $eloquentPaginator */
        $eloquentPaginator = LanguageModel::query()
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

        $paginator = new CursorPaginator($eloquentPaginator);
        $languages = new Languages($eloquentPaginator->getCollection());
        $languages->setPaginator($paginator);

        return $languages;
    }

    public function get(int $id): ?Language
    {
        return LanguageModel::find($id);
    }
}
