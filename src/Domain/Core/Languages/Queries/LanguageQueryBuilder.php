<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Queries;

use App\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;
use Domain\Core\Languages\Filters\LanguageFilter;
use Illuminate\Database\Eloquent\Builder;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

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
