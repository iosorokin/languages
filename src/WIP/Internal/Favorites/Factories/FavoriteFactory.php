<?php

declare(strict_types=1);

namespace WIP\Internal\Favorites\Factories;

use Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent\EloquentUserModel;
use WIP\Internal\Favorites\Contracts\Favoriteable;
use WIP\Internal\Favorites\Model\Favorite;

final class FavoriteFactory
{
    public function create(EloquentUserModel $user, Favoriteable $favoriteable): Favorite
    {
        $favorite = new Favorite();
        $favorite->user()->associate($user);
        $favorite->favoriteable()->associate($favoriteable);

        return $favorite;
    }
}
