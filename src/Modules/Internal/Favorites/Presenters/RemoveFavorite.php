<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Presenters;

use Modules\Internal\Favorites\Policies\FavoritePolicy;
use Modules\Internal\Favorites\Repositories\FavoriteRepository;
use Modules\Personal\Auth\Contexts\Client;

final class RemoveFavorite implements RemoveFavoritePresenter
{
    public function __construct(
        private FavoriteRepository $repository,
        private FavoritePolicy $favoritePolicy,
    )
    {
    }

    public function __invoke(Client $client, int $favoriteId): void
    {
        $favorite = $this->repository->get($favoriteId);
        $this->favoritePolicy->canRemove($client, $favorite);
        $this->repository->delete($favorite);
    }
}
