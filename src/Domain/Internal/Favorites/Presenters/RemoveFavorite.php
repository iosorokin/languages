<?php

declare(strict_types=1);

namespace Domain\Internal\Favorites\Presenters;

use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Domain\Internal\Favorites\Authorization\FavoriteUserAuthorize;
use Domain\Internal\Favorites\Presenters\Internal\GetFavorite;

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
