<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\User;

use App\Controllers\Auth\Internal\GetAuthUser;
use Modules\Internal\Favorites\Presenters\RemoveFavorite;

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
