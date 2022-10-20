<?php

declare(strict_types=1);

namespace App\Base\Repository;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Collection;

abstract class BaseRepository
{
    public function exec(Builder $query): Collection
    {
        return $query->get();
    }
}
