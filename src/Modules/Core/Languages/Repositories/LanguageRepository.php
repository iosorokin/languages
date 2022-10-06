<?php

namespace Modules\Core\Languages\Repositories;

use Illuminate\Pagination\CursorPaginator;
use Modules\Core\Languages\Entities\Language;
use Modules\Core\Languages\Filters\RealLanguageFilter;

interface LanguageRepository
{
    public function save(Language $language): void;

    public function all(RealLanguageFilter $filter): CursorPaginator;

    public function get(int $id): ?Language;
}
