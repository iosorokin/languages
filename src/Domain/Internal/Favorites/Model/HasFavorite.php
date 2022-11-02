<?php

declare(strict_types=1);

namespace Domain\Internal\Favorites\Model;

use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasFavorite
{
    public function favorite(): MorphOne
    {
        return $this->morphOne(Favorite::class, 'favoriteable');
    }
}
