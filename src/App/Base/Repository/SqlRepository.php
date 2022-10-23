<?php

namespace App\Base\Repository;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Contracts\Pagination\CursorPaginator;

interface SqlRepository
{
    public function cursorPaginate(Builder $query): CursorPaginator;

    public function count(Builder $query): int;
}
