<?php

declare(strict_types=1);

namespace Domain\Internal\Favorites\Presenters;

use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Domain\Internal\Favorites\Contracts\Favoriteable;
use Domain\Internal\Favorites\Factories\FavoriteFactory;
use Domain\Internal\Favorites\Model\Favorite;

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
