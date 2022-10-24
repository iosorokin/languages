<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\User;

use Modules\Internal\Favorites\Presenters\RemoveFavorite;
use Modules\Personal\Auth\Presenters\Internal\GetAuthUser;

final class UserRemoveFromFavorite
{
    public function __construct(
        private GetAuthUser    $getAuthUser,
        private RemoveFavorite $removeFavorite,
    ) {}

    public function __invoke(array $attributes): void
    {
        $auth = ($this->getAuthUser)();
        ($this->removeFavorite)($auth, (int) $attributes['favorite_id']);
    }
}
