<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Repositories;

use App\Base\Repository\BaseSqlRepository;
use Modules\Internal\Favorites\Structures\Favorite;
use Modules\Internal\Favorites\Structures\FavoriteModel;

final class EloquentFavoriteRepository extends BaseSqlRepository implements FavoriteRepository
{
    public function get(int $id): Favorite
    {
        return FavoriteModel::find($id);
    }

    public function save(Favorite $favorite): void
    {
        $favorite->save();
    }

    public function delete(Favorite|int $favorite): void
    {
        $favorite->delete();
    }
}
