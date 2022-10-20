<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Structures;

use App\Base\Structure\Identify\IntId;
use App\Base\Structure\IsActiveAttributes;
use App\Base\Structure\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Internal\Favorites\Structures\FavoriteModel;
use Modules\Personal\User\Structures\EloquentUserRelation;

final class LanguageModel extends Model implements Language
{
    use EloquentUserRelation;
    use IsActiveAttributes;
    use IntId;
    use LanguageAttributes;
    use Timestamps;
    use LanguageFillableAttributes;

    protected $table = 'languages';

    public function favorites(): HasMany
    {
        return $this->hasMany(FavoriteModel::class);
    }
}
