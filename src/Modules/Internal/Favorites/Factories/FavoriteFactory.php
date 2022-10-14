<?php

namespace Modules\Internal\Favorites\Factories;

use Modules\Internal\Favorites\Contracts\Favoriteable;
use Modules\Internal\Favorites\Structures\Favorite;
use Modules\Personal\User\Structures\User;

interface FavoriteFactory
{
    public function create(User $user, Favoriteable $favoriteable): Favorite;
}
