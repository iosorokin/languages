<?php

namespace Modules\Domain\Languages\Presenters\User;

use Modules\Internal\Favorites\Structures\Favorite;

interface UserAddLanguageToFavoritePresenter
{
    public function __invoke(int $languageId): Favorite;
}
