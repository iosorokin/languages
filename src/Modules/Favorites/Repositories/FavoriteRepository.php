<?php

namespace Modules\Favorites\Repositories;

use Modules\Favorites\Structures\Favorite;

interface FavoriteRepository
{
    public function save(Favorite $favorite): void;

    public function delete(Favorite|int $favorite): void;
}
