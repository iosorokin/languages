<?php

declare(strict_types=1);

namespace WIP\Internal\Favorites\Presenters;

use Core\Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent\EloquentUserModel;
use WIP\Internal\Favorites\Contracts\Favoriteable;
use WIP\Internal\Favorites\Factories\FavoriteFactory;
use WIP\Internal\Favorites\Model\Favorite;

final class AddToFavorite
{
    public function __construct(
        private FavoriteFactory    $factory,
    ) {}

    public function __invoke(EloquentUserModel $user, Favoriteable $favoriteable): Favorite
    {
        $favorite = $this->factory->create($user, $favoriteable);
        $favorite->save();

        return $favorite;
    }
}
