<?php

namespace Modules\Internal\Favorites\Structures;

use App\Base\Structure\Identify\HasIntId;
use App\Base\Structure\Timestamps\HasTimestamps;
use Modules\Internal\Favorites\Entities\Favoriteable;
use Modules\Personal\User\Structures\HasUser;

interface Favorite extends
    HasIntId,
    HasUser,
    HasTimestamps
{
    public function setFavoriteable(Favoriteable $favoriteable): self;

    public function getFavoriteable(): Favoriteable;
}
