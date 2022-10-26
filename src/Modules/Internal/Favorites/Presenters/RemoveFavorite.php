<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Presenters;

use App\Database\Personal\EloquentUserModel;
use Modules\Internal\Favorites\Authorization\FavoriteUserAuthorize;
use Modules\Internal\Favorites\Presenters\Internal\GetFavorite;

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
