<?php

namespace Modules\Favorites\Repositories;

use Modules\Favorites\Entitites\Favorite;

interface FavoriteRepository
{
    public function save(Favorite $favorite): void;

    public function delete(Favorite|int $favorite): void;
}
