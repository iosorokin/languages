<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Factories\Builder;

use Modules\Personal\User\Structures\User;

interface LanguageQueryBuilder
{
    public function selectLanguage($fields = ['*']): self;

    public function selectFavoriteId(): self;

    public function whereIsActive(bool $isActive = true): self;

    public function whereName(string $name): self;

    public function whereNativeName(string $nativeName): self;

    public function whereCode(string $code): self;

    public function orderByName(): self;

    public function orderByUserFavorite(): self;

    public function leftJoinUserFavorite(User|int $user): self;

    public function whereUserFavorite(User|int $user): self;
}
