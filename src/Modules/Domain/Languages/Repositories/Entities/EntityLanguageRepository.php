<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Repositories\Entities;

use App\Base\Repository\BaseSqlRepository;
use Illuminate\Contracts\Pagination\CursorPaginator as EloquentCursorPaginator;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Factories\Structure\EntityLanguageStructureFactory;
use Modules\Domain\Languages\Repositories\Filters\UserLanguageFilter;
use Modules\Domain\Languages\Repositories\LanguageRepository;
use Modules\Domain\Languages\Structures\Language;

final class EntityLanguageRepository extends BaseSqlRepository implements LanguageRepository
{
    public function __construct(
        private EntityLanguageStructureFactory $factory
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

    public function delete(Language $language): void
    {
        // TODO: Implement delete() method.
    }
}
