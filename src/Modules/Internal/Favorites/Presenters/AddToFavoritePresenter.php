<?php

namespace Modules\Internal\Favorites\Presenters;

use Modules\Internal\Favorites\Entities\Favoriteable;
use Modules\Internal\Favorites\Structures\Favorite;
use Modules\Personal\User\Structures\User;

interface AddToFavoritePresenter
{
    public function __invoke(User $user, Favoriteable $favoriteable): Favorite;
}
