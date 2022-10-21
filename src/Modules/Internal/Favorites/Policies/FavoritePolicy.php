<?php

namespace Modules\Internal\Favorites\Policies;

use Modules\Internal\Favorites\Structures\Favorite;
use Modules\Personal\Auth\Contexts\Client;

interface FavoritePolicy
{
    public function canRemove(Client $client, Favorite $favorite);
}
