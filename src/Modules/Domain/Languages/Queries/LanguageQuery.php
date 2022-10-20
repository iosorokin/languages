<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Queries;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

final class LanguageQuery
{
    private Builder $builder;

    public function __construct()
    {
        $this->builder = DB::table('languages');
    }

    public function filter(array $filters): self
    {
        /**
         * select
         * where
         * join
         *
         * having
         */
    }
}
