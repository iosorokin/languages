<?php

declare(strict_types=1);

namespace WIP\Internal\Favorites\Presenters;

use Core\Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent\EloquentUserModel;
use WIP\Internal\Favorites\Authorization\FavoriteUserAuthorize;
use WIP\Internal\Favorites\Presenters\Internal\GetFavorite;

final class RemoveFavorite
{
    public function __construct(
        private GetFavorite           $getFavorite,
        private FavoriteUserAuthorize $authorize,
    ) {}

    public function __invoke(EloquentUserModel $user, int $favoriteId): void
    {
        $favorite = $this->getFavorite->getOrThrowNotFound($favoriteId);
        $this->authorize->canRemove($user, $favorite);
        $favorite->delete();
    }
}
