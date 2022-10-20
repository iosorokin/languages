<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Repositories\Eloquent;

use App\Helpers\Cast;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Modules\Domain\Languages\Repositories\LanguageQueryBuilder;
use Modules\Personal\User\Structures\User;

final class EloquentLanguageQueryBuilder extends LanguageQueryBuilder
{
    public function __construct(
        private Builder $query
    ){
        $this->query = $this->query ?? DB::table('languages');
    }

    public function whereIsActive(bool $isActive = true): self
    {
        $this->query->where('is_active', $isActive);

        return $this;
    }

    public function whereName(string $name): self
    {
        $this->query->where('name', sprintf('%%s%', $name));

        return $this;
    }

    public function whereNativeName(string $nativeName): self
    {
        $this->query->where('native_name', sprintf('%%s%', $nativeName));

        return $this;
    }

    public function whereCode(string $code): self
    {
        $this->query->where('code', sprintf('%%s%', $code));

        return $this;
    }

    public function withUserFavorite(User|int $user): self
    {
        $this->query->with('favorites');

        return $this;
    }

    public function whereUserFavorite(User|int $user): self
    {
        $this->query->whereHas('favorites', function (Builder $query) use ($user) {
            $query->where('user_id', Cast::idToInt($user));
        });

        return $this;
    }

    public function orderByName(): self
    {
        $this->query->orderBy('name');

        return $this;
    }

    public function query(): Builder
    {
        return $this->query;
    }
}
