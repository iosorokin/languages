<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Authorization;

use App\Database\Personal\EloquentUserModel;
use Modules\Internal\Favorites\Model\Favorite;

final class FavoriteUserAuthorize
{
    public function canRemove(EloquentUserModel $user, Favorite $favorite)
    {
        if ($user->id !== $favorite->user_id) {
            abort(403);
        }
    }
}
