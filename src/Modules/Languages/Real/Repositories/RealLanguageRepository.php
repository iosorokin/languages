<?php

namespace Modules\Languages\Real\Repositories;

use Illuminate\Pagination\CursorPaginator;
use Modules\Languages\Real\Filters\RealLanguageFilter;
use Modules\Languages\Real\Structures\RealLanguageStructure;
use stdClass;

interface RealLanguageRepository
{
    public function add(RealLanguageStructure $language): void;

    public function all(RealLanguageFilter $filter): CursorPaginator;

    public function get(int $id): stdClass;
}
