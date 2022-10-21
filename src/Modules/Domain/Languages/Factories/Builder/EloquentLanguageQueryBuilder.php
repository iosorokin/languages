<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Factories\Builder;

use App\Helpers\Cast;
use Illuminate\Database\Eloquent\Builder;
use Modules\Personal\User\Structures\User;

/**
 * @property \Illuminate\Contracts\Database\Eloquent\Builder $query
 */
final class EloquentLanguageQueryBuilder extends BaseLanguageQueryBuilder
{
    public function withUserFavorite(User|int $user): self
    {
        $this->query->with('favorites');

        return $this;
    }

    public function whereUserFavorite(User|int $user): self
    {
        $this->query->whereHas(
            'favorites',
            fn (Builder $query) => $query->where('user_id', Cast::idToInt($user))
        );

        return $this;
    }
}
