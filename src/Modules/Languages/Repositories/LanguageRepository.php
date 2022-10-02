<?php

namespace Modules\Languages\Repositories;

use Illuminate\Pagination\CursorPaginator;
use Modules\Languages\Filters\RealLanguageFilter;
use Modules\Languages\Entity\Language;

interface LanguageRepository
{
    public function save(Language $language): void;

    public function all(RealLanguageFilter $filter): CursorPaginator;

    public function get(int $id): ?Language;
}
