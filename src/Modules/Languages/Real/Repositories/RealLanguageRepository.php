<?php

namespace Modules\Languages\Real\Repositories;

use App\Contracts\Structures\RealLanguageStructure;
use Illuminate\Pagination\CursorPaginator;
use Modules\Languages\Real\Filters\RealLanguageFilter;
use stdClass;

interface RealLanguageRepository
{
    public function add(RealLanguageStructure $language): void;

    public function all(RealLanguageFilter $filter): CursorPaginator;

    public function get(int $id): stdClass;
}
