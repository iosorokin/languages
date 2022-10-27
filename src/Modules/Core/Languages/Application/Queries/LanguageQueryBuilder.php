<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Application\Queries;

use Illuminate\Database\Eloquent\Builder;
use Modules\Core\Languages\Application\Filters\LanguageFilter;
use Modules\Core\Languages\Infrastructure\Model\Language;
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
