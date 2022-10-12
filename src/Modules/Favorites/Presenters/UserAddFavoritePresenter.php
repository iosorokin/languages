<?php

namespace Modules\Favorites\Presenters;

use Modules\Favorites\Contracts\Favoriteable;
use Modules\Favorites\Structures\Favorite;

interface UserAddFavoritePresenter
{
    public function __invoke(Favoriteable $favoriteable): Favorite;
}
