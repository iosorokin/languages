<?php

declare(strict_types=1);

namespace Domain\Internal\Favorites\Factories;

use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Domain\Internal\Favorites\Contracts\Favoriteable;
use Domain\Internal\Favorites\Model\Favorite;

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
