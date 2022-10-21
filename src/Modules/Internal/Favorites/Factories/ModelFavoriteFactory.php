<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Factories;

use Modules\Internal\Favorites\Entities\Favoriteable;
use Modules\Internal\Favorites\Structures\Favorite;
use Modules\Internal\Favorites\Structures\FavoriteModel;
use Modules\Personal\User\Structures\User;

final class ModelFavoriteFactory implements FavoriteFactory
{
    public function create(User $user, Favoriteable $favoriteable): Favorite
    {
        $favorite = new FavoriteModel();
        $favorite->setUser($user);
        $favorite->setFavoriteable($favoriteable);

        return $favorite;
    }
}
