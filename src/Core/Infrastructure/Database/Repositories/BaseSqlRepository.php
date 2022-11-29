<?php

declare(strict_types=1);

namespace Core\Infrastructure\Database\Repositories;

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

    public function count(Builder $query): int
    {
        return $query->count();
    }
}
