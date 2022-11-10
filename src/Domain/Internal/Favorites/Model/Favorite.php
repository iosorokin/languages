<?php

declare(strict_types=1);

namespace Domain\Internal\Favorites\Model;

use App\Base\Structure\Identify\IntId;
use App\Base\Structure\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Domain\Account\User\Database\Eloquent\Model\HasUser;

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