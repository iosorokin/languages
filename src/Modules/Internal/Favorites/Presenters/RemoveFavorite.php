<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Presenters;

use Modules\Personal\Auth\Contexts\Client;

final class RemoveFavorite implements RemoveFavoritePresenter
{
    public function __invoke(Client $client, int $favoriteId): void
    {
        // TODO: Implement __invoke() method.
    }
}
