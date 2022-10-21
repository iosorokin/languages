<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Factories\Builder;

use App\Base\QueryBuilder\SqlQueryBuilder;
use Core\Services\Morph\Morph;
use Illuminate\Contracts\Database\Query\Builder;
use Modules\Domain\Languages\Structures\Language;
use Modules\Personal\User\Structures\User;

abstract class BaseLanguageQueryBuilder extends SqlQueryBuilder implements LanguageQueryBuilder
{
    public function selectLanguage($fields = ['*']): self
    {
        foreach ($fields as $field) {
            $this->query->addSelect('languages.' . $field);
        }

        return $this;
    }

    public function selectFavoriteId(): self
    {
        $this->query->addSelect('favorites.id as favorite_id');

        return $this;
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

    public function orderByName(): self
    {
        $this->query->orderBy('name');

        return $this;
    }

    public function orderByUserFavorite(): self
    {
        $this->query->orderBy('favorites.id');

        return $this;
    }

    public function leftJoinUserFavorite(User|int $user): self
    {
        $this->query->leftJoin('favorites', function (Builder $query) use ($user) {
            $query->where('favoriteable_type', Morph::getMorph(Language::class))
                ->whereColumn('favoriteable_id', 'languages.id')
                ->where('languages.user_id', $user->getId());
        });

        return $this;
    }

    abstract public function withUserFavorite(User|int $user): self;

    abstract public function whereUserFavorite(User|int $user): self;
}
