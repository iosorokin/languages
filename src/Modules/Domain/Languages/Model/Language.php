<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Model;

use App\Base\Structure\Identify\IntId;
use App\Base\Structure\IsActiveAttributes;
use App\Base\Structure\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Internal\Favorites\Contracts\Favoriteable;
use Modules\Internal\Favorites\Model\HasFavorite;
use Modules\Personal\User\Model\HasUser;

final class Language extends Model implements Favoriteable
{
    use IntId;
    use HasFavorite;
    use HasUser;
    use IsActiveAttributes;
    use Timestamps;
}
