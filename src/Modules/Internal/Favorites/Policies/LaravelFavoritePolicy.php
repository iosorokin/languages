<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Policies;

use Modules\Internal\Favorites\Structures\Favorite;
use Modules\Personal\Auth\Contexts\Client;

final class LaravelFavoritePolicy implements FavoritePolicy
{
    public function canRemove(Client $client, Favorite $favorite)
    {
        if ($client->id() !== $favorite->getUserId()) {
            abort(403);
        }
    }
}
