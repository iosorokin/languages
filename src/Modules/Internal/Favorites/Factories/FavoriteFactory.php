<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Factories;

use Modules\Internal\Favorites\Contracts\Favoriteable;
use Modules\Internal\Favorites\Model\Favorite;
use Modules\Personal\User\Model\User;

final class FavoriteFactory
{
    public function create(User $user, Favoriteable $favoriteable): Favorite
    {
        $favorite = new Favorite();
        $favorite->user()->associate($user);
        $favorite->favoriteable()->associate($favoriteable);

        return $favorite;
    }
}
