<?php

namespace Modules\Favorites\Presenters;

use Modules\Favorites\Structures\Favorite;

interface UserRemoveFavoritePresenter
{
    public function __invoke(Favorite|int $favorite): void;
}
