<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Factories;

use Modules\Internal\Favorites\Contracts\Favoriteable;
use Modules\Internal\Favorites\Model\Favorite;
use Modules\Personal\Infrastructure\Repository\Eloquent\EloquentUserModel;

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
