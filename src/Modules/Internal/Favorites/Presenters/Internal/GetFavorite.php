<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Presenters\Internal;

use Modules\Internal\Favorites\Model\Favorite;

final class GetFavorite
{
    public function __construct()
    {
    }

    public function get(int $id): ?Favorite
    {
        return Favorite::find($id);
    }

    public function getOrThrowNotFound(int $id): Favorite
    {
        $favorite = $this->get($id);
        abort_if(! $favorite, 404);

        return $favorite;
    }
}
