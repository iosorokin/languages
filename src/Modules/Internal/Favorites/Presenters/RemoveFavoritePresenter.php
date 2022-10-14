<?php

namespace Modules\Internal\Favorites\Presenters;

use Modules\Personal\Auth\Contexts\Client;

interface RemoveFavoritePresenter
{
    public function __invoke(Client $client, int $favoriteId): void;
}
