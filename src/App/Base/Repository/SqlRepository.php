<?php

namespace App\Base\Repository;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Contracts\Pagination\CursorPaginator;
use Illuminate\Support\Collection;

interface SqlRepository
{
    public function get(Builder $query): Collection;

    public function cursorPaginate(Builder $query): CursorPaginator;
}
