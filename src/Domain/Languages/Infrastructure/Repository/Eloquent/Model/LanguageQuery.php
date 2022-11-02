<?php

declare(strict_types=1);

namespace Domain\Languages\Infrastructure\Repository\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Infrastructure\Services\Morph\Morph;

trait LanguageQuery
{
    public function scopeSelectLanguage(Builder $query, $fields = ['*']): void
    {
        foreach ($fields as $field) {
            $query->addSelect('languages.' . $field);
        }
    }

    public function scopeSelectFavoriteId(Builder $query): void
    {
        $query->addSelect('favorites.id as favorite_id');
    }

    public function scopeWhereIsActive(Builder $query, bool $isActive = true): void
    {
        $query->where('is_active', $isActive);
    }

    public function scopeWhereName(Builder $query, string $name): void
    {
        $query->where('name', sprintf('%%s%', $name));
    }

    public function scopeWhereNativeName(Builder $query, string $nativeName): void
    {
        $query->where('native_name', sprintf('%%s%', $nativeName));
    }

    public function scopeWhereCode(Builder $query, string $code): void
    {
        $query->where('code', sprintf('%%s%', $code));
    }

    public function scopeOrderByName(Builder $query): void
    {
        $query->orderBy('name');
    }

    public function scopeOrderByUserFavorite(Builder $query): void
    {
        $query->orderBy('favorites.id');
    }

    public function scopeWhereUserFavorite(Builder $query, EloquentUserModel|int $user): void
    {
        $userId = is_int($user) ? $user : $user->id;
        $query->rightJoin('favorites', function (JoinClause $query) use ($userId) {
            $query->where('favoriteable_type', Morph::getAlias(LanguageModel::class))
                ->whereColumn('favoriteable_id', 'languages.id')
                ->where('languages.user_id', $userId);
        });
    }

    public function scopeLeftJoinUserFavorite(Builder $query, EloquentUserModel|int $user): void
    {
        $userId = is_int($user) ? $user : $user->id;
        $query->leftJoin('favorites', function (JoinClause $query) use ($userId) {
            $query->where('favoriteable_type', Morph::getAlias(LanguageModel::class))
                ->whereColumn('favoriteable_id', 'languages.id')
                ->where('languages.user_id', $userId);
        });
    }
}
