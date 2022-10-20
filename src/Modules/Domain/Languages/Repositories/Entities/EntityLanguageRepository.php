<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Repositories\Entities;

use Core\Services\Pagination\CursorPaginator;
use Illuminate\Contracts\Pagination\CursorPaginator as EloquentCursorPaginator;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Factories\EntityLanguageFactory;
use Modules\Domain\Languages\Repositories\Filters\UserLanguageFilter;
use Modules\Domain\Languages\Repositories\LanguageRepository;
use Modules\Domain\Languages\Structures\Language;
use stdClass;

final class EntityLanguageRepository implements LanguageRepository
{
    public function __construct(
        private EntityLanguageFactory $factory
    ) {}

    public function save(Language $language): void
    {
        // TODO: Implement save() method.
    }

    public function get(int $id): ?Language
    {
        $language = DB::table('languages')
            ->where('id', $id)
            ->first();

        if ($language) {
            $language = $this->factory->restore((array) $language);
        }

        return $language;
    }

    public function all(UserLanguageFilter $filter): Languages
    {
        /** @var EloquentCursorPaginator $eloquentPaginator */
        $eloquentPaginator = DB::table('languages')
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



        return $languages;
    }

    public function delete(Language $language): void
    {
        // TODO: Implement delete() method.
    }
}
