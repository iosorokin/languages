<?php

namespace Modules\Internal\Favorites\Presenters;

use Modules\Internal\Favorites\Contracts\Favoriteable;
use Modules\Personal\Auth\Contexts\Client;
use Modules\Personal\User\Structures\User;

interface AddToFavoritePresenter
{
    public function __invoke(User $user, Favoriteable $favoriteable);
}
