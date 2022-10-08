<?php

namespace Modules\Favorites\Presenters;

use Modules\Favorites\Entitites\Favorite;

interface UserRemoveFavoritePresenter
{
    public function __invoke(Favorite|int $favorite): void;
}
