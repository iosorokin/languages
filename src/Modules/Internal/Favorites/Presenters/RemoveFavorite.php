<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Presenters;

use Modules\Internal\Favorites\Authorization\FavoriteUserAuthorize;
use Modules\Internal\Favorites\Presenters\Internal\GetFavorite;
use Modules\Personal\User\Model\User;

final class RemoveFavorite
{
    public function __construct(
        private GetFavorite           $getFavorite,
        private FavoriteUserAuthorize $authorize,
    ) {}

    public function __invoke(User $user, int $favoriteId): void
    {
        $favorite = $this->getFavorite->getOrThrowNotFound($favoriteId);
        $this->authorize->canRemove($user, $favorite);
        $favorite->delete();
    }
}
