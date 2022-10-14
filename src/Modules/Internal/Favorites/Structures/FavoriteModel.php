<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Structures;

use App\Base\Structures\Identify\IntId;
use App\Base\Structures\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Personal\User\Structures\EloquentUserRelation;

final class FavoriteModel extends Model implements Favorite
{
    use IntId;
    use EloquentUserRelation;
    use Timestamps;

    protected $table = 'favorites';

    public function setIsFavorite(bool $isFavorite): Favorite
    {
        $this->is_favorite = $isFavorite;
    }

    public function isFavorite(): bool
    {
        return $this->is_favorite;
    }
}
