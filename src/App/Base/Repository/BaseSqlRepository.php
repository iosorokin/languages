<?php

declare(strict_types=1);

namespace App\Base\Repository;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Contracts\Pagination\CursorPaginator;
use Illuminate\Support\Collection;

abstract class BaseSqlRepository implements SqlRepository
{
    public function exec(Builder $query): Collection
    {
        return $query->get();
    }

    public function cursorPaginate(Builder $query): CursorPaginator
    {
        return $query->cursorPaginate();
    }
}