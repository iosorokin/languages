<?php

namespace Modules\Domain\Languages\Repositories;

use Illuminate\Pagination\CursorPaginator;
use Modules\Domain\Languages\Entities\Language;
use Modules\Domain\Languages\Filters\RealLanguageFilter;

interface LanguageRepository
{
    public function save(Language $language): void;

    public function all(RealLanguageFilter $filter): CursorPaginator;

    public function get(int $id): ?Language;
}
