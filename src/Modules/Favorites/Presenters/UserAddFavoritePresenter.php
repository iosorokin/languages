<?php

namespace Modules\Favorites\Presenters;

use Modules\Favorites\Contracts\Favoriteable;
use Modules\Favorites\Entitites\Favorite;

interface UserAddFavoritePresenter
{
    public function __invoke(Favoriteable $favoriteable): Favorite;
}
