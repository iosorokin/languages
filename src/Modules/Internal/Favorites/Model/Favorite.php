<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Model;

use App\Base\Structure\Identify\IntId;
use App\Base\Structure\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Personal\User\Model\HasUser;

final class Favorite extends Model
{
    use IntId;
    use HasUser;
    use Timestamps;

    public function favoriteable(): MorphTo
    {
        return $this->morphTo();
    }
}
