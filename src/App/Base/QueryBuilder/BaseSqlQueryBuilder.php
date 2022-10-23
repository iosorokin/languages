<?php

declare(strict_types=1);

namespace App\Base\QueryBuilder;

use Illuminate\Contracts\Database\Query\Builder;

abstract class BaseSqlQueryBuilder
{
    public function __construct(
        protected Builder $query
    ){}

    public function query(): Builder
    {
        return $this->query;
    }
}
