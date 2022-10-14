<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Repositories;

use Modules\Internal\Favorites\Structures\Favorite;

final class EloquentFavoriteRepository implements FavoriteRepository
{
    public function save(Favorite $favorite): void
    {
        $favorite->save();
    }

    public function delete(Favorite|int $favorite): void
    {
        $favorite->delete();
    }
}
