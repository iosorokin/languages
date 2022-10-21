<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Services;

use Illuminate\Contracts\Database\Query\Builder;
use Modules\Domain\Languages\Factories\Builder\LanguageQueryBuilder;
use Modules\Domain\Languages\Repositories\Filters\LanguageFilter;
use Modules\Personal\User\Structures\User;

final class LanguageQueryManager
{
    private LanguageQueryBuilder $queryBuilder;

    public function setQueryBuilder(LanguageQueryBuilder $queryBuilder): self
    {
        $this->queryBuilder = $queryBuilder;

        return $this;
    }

    public function user(User $user, array $attributes): Builder
    {
        $this->guest($attributes);
        $this->queryBuilder->selectFavoriteId();
        $this->queryBuilder->leftJoinUserFavorite($user);
        $this->queryBuilder->orderByUserFavorite();

        return $this->queryBuilder->query();
    }

    public function guest(array $attributes): Builder
    {
        $this->commonFilters($attributes);
        $this->queryBuilder->selectLanguage();
        $this->queryBuilder->orderByName();
        $this->queryBuilder->whereIsActive();

        return $this->queryBuilder->query();
    }

    private function commonFilters(array $attributes): void
    {
        $filter = LanguageFilter::new($attributes);
        $filter->filter($this->queryBuilder);
    }
}
