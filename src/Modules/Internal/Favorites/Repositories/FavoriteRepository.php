<?php

namespace Modules\Internal\Favorites\Repositories;

use App\Base\Repository\SqlRepository;
use Modules\Internal\Favorites\Structures\Favorite;

interface FavoriteRepository extends SqlRepository
{
    public function get(int $id): Favorite;

    public function save(Favorite $favorite): void;

    public function delete(Favorite|int $favorite): void;
}
