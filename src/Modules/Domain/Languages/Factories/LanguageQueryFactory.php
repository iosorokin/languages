<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Factories;

use Illuminate\Contracts\Database\Query\Builder;
use Modules\Domain\Languages\Repositories\Filters\LanguageFilter;
use Modules\Domain\Languages\Repositories\BaseLanguageQueryBuilder;
use Modules\Domain\Languages\Repositories\LanguageQueryBuilder;

final class LanguageQueryFactory
{
    public function __construct(
        private LanguageQueryBuilder $queryBuilder,
    ) {}

    public function user(array $attributes): Builder
    {
        $this->commonFilters($attributes);
        $this->queryBuilder->orderByUserFavorite();
        $this->queryBuilder->orderByName();
        $this->queryBuilder->whereIsActive();

        return $this->queryBuilder->query();
    }

    public function guest(array $attributes): Builder
    {

    }

    private function commonFilters(array $attributes): void
    {
        $filter = LanguageFilter::new($attributes);
        $filter->filter($this->queryBuilder);
    }
}
