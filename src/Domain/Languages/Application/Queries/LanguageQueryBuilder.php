<?php

declare(strict_types=1);

namespace Domain\Languages\Application\Queries;

use Illuminate\Database\Eloquent\Builder;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Domain\Languages\Application\Filters\LanguageFilter;
use Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;

final class LanguageQueryBuilder
{
    public function admin(EloquentUserModel $user, array $attributes): Builder
    {
        return $this->user($user, $attributes);
    }

    public function user(EloquentUserModel $user, array $attributes): Builder
    {
        $query = $this->guest($attributes)->selectFavoriteId()
            ->leftJoinUserFavorite($user)
            ->orderByUserFavorite();

        return $query;
    }

    public function guest(array $attributes): Builder
    {
        $query = LanguageModel::query()
            ->selectLanguage()
            ->orderByName()
            ->whereIsActive();
        $this->commonFilters($query, $attributes);

        return $query;
    }

    private function commonFilters(Builder $query, array $attributes): void
    {
        $filter = LanguageFilter::new($attributes);
        $filter->filter($query);
    }
}
