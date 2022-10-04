<?php

namespace Modules\Languages\Repositories;

use Illuminate\Pagination\CursorPaginator;
use Modules\Languages\Filters\RealLanguageFilter;
use Modules\Languages\Entities\Language;

interface LanguageRepository
{
    public function save(Language $language): void;

    public function all(RealLanguageFilter $filter): CursorPaginator;

    public function get(int $id): ?Language;
}
