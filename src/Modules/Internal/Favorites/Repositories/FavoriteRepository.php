<?php

namespace Modules\Internal\Favorites\Repositories;

use Modules\Internal\Favorites\Structures\Favorite;

interface FavoriteRepository
{
    public function save(Favorite $favorite): void;

    public function delete(Favorite|int $favorite): void;
}
