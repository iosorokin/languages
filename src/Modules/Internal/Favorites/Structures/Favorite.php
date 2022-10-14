<?php

namespace Modules\Internal\Favorites\Structures;

use App\Base\Structures\Identify\HasIntId;
use App\Base\Structures\Timestamps\HasTimestamps;
use Modules\Internal\Favorites\Contracts\Favoriteable;
use Modules\Personal\User\Structures\HasUser;

interface Favorite extends
    HasIntId,
    HasUser,
    HasTimestamps
{
    public function setFavoriteable(Favoriteable $favoriteable): self;

    public function getFavoriteable(): Favoriteable;
}
