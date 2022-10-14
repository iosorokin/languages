<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Presenters;

use Modules\Internal\Favorites\Contracts\Favoriteable;
use Modules\Internal\Favorites\Factories\FavoriteFactory;
use Modules\Internal\Favorites\Repositories\FavoriteRepository;
use Modules\Internal\Favorites\Structures\Favorite;
use Modules\Personal\User\Structures\User;

final class AddToFavorite implements AddToFavoritePresenter
{
    public function __construct(
        private FavoriteFactory    $factory,
        private FavoriteRepository $repository,
    ) {}

    public function __invoke(User $user, Favoriteable $favoriteable): Favorite
    {
        $favorite = $this->factory->create($user, $favoriteable);
        $this->repository->save($favorite);

        return $favorite;
    }
}
