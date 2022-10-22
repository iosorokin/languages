<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\User;

use Modules\Internal\Favorites\Presenters\RemoveFavoritePresenter;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class UserRemoveFromFavorite implements UserRemoveLanguageFromFavoritePresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private RemoveFavoritePresenter $removeFavorite,
    ) {}

    public function __invoke(array $attributes): void
    {
        $client = ($this->getClient)();
        // todo проверить авторизацию !!!!
        ($this->removeFavorite)($client, (int) $attributes['favorite_id']);
    }
}
