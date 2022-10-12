<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Repositories;

use Core\Services\Pagination\CursorPaginator;
use Illuminate\Contracts\Pagination\CursorPaginator as EloquentCursorPaginator;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Entities\Language;
use Modules\Domain\Languages\Factories\EntityLanguageFactory;
use Modules\Domain\Languages\Filters\LanguageFilter;
use stdClass;
use function Symfony\Component\Translation\t;

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
        // TODO: Implement get() method.
    }

    public function all(LanguageFilter $filter): Languages
    {
        /** @var EloquentCursorPaginator $eloquentPaginator */
        $eloquentPaginator = DB::table('languages')
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
        $eloquentPaginator->getCollection()
            ->transform(function (stdClass $item) {
                return $this->factory->restore((array) $item);
            });

        $paginator = new CursorPaginator($eloquentPaginator);
        $languages = new Languages($eloquentPaginator->getCollection());
        $languages->setPaginator($paginator);

        return $languages;
    }
}
