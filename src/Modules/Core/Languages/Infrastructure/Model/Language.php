<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Infrastructure\Model;

use App\Base\Structure\Identify\IntId;
use App\Base\Structure\IsActiveAttributes;
use App\Base\Structure\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Internal\Favorites\Contracts\Favoriteable;
use Modules\Internal\Favorites\Model\HasFavorite;
use Modules\Personal\User\Database\Eloquent\Model\HasUser;

final class Language extends Model implements Favoriteable
{
    use IntId;
    use HasFavorite;
    use HasUser;
    use IsActiveAttributes;
    use Timestamps;

    use LanguageQuery;
}
