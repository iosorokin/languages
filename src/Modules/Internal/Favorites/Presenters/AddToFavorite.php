<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Presenters;

use Modules\Internal\Favorites\Contracts\Favoriteable;
use Modules\Personal\User\Structures\User;

final class AddToFavorite implements AddToFavoritePresenter
{
    public function __construct(

    )
    {
    }

    public function __invoke(User $user, Favoriteable $favoriteable)
    {

    }
}
