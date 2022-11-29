<?php

declare(strict_types=1);

namespace WIP\Internal\Favorites\Authorization;

use Core\Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent\EloquentUserModel;
use WIP\Internal\Favorites\Model\Favorite;

final class FavoriteUserAuthorize
{
    public function canRemove(EloquentUserModel $user, Favorite $favorite)
    {
        if ($user->id !== $favorite->user_id) {
            abort(403);
        }
    }
}
