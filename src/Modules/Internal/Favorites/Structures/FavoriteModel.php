<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Structures;

use App\Base\Structure\Identify\IntId;
use App\Base\Structure\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Internal\Favorites\Entities\Favoriteable;
use Modules\Personal\User\Structures\EloquentUserRelation;

final class FavoriteModel extends Model implements Favorite
{
    use IntId;
    use EloquentUserRelation;
    use Timestamps;

    protected $table = 'favorites';

    public function favoriteable(): MorphTo
    {
        return $this->morphTo();
    }

    public function setFavoriteable(Favoriteable $favoriteable): self
    {
        /** @var Model $favoriteable */
        $this->favoriteable()->associate($favoriteable);

        return $this;
    }

    public function getFavoriteable(): Favoriteable
    {
        return $this->favoriteable;
    }
}
