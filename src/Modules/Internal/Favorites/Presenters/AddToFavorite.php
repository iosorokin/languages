<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Presenters;

use Modules\Internal\Favorites\Contracts\Favoriteable;
use Modules\Internal\Favorites\Factories\FavoriteFactory;
use Modules\Internal\Favorites\Model\Favorite;
use Modules\Personal\User\Model\User;

final class AddToFavorite
{
    public function __construct(
        private FavoriteFactory    $factory,
    ) {}

    public function __invoke(User $user, Favoriteable $favoriteable): Favorite
    {
        $favorite = $this->factory->create($user, $favoriteable);
        $favorite->save();

        return $favorite;
    }
}
