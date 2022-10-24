<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Authorization;

use Modules\Internal\Favorites\Model\Favorite;
use Modules\Personal\User\Model\User;

final class FavoriteUserAuthorize
{
    public function canRemove(User $user, Favorite $favorite)
    {
        if ($user->id !== $favorite->id) {
            abort(403);
        }
    }
}
