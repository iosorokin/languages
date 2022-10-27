<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Queries;

use Illuminate\Database\Eloquent\Builder;
use Modules\Domain\Languages\Filters\LanguageFilter;
use Modules\Domain\Languages\Model\Language;
use Modules\Personal\Infrastructure\Repository\EloquentUserModel;

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
        $query = Language::query()
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
