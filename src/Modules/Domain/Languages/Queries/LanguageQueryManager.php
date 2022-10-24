<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Queries;

use Illuminate\Contracts\Database\Query\Builder;
use Modules\Domain\Languages\Filters\LanguageFilter;
use Modules\Personal\User\Model\User;

final class LanguageQueryManager
{
    public function __construct(
        private LanguageQueryBuilder $queryBuilder,
    ) {}

    public function setQueryBuilder(LanguageQueryBuilder $queryBuilder): self
    {
        $this->queryBuilder = $queryBuilder;

        return $this;
    }

    public function admin(User $user, array $attributes): Builder
    {
        return $this->user($user, $attributes);
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
