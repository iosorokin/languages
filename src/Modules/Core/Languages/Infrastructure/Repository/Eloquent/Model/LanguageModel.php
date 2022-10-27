<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Infrastructure\Repository\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Internal\Favorites\Contracts\Favoriteable;
use Modules\Personal\Infrastructure\Repository\Eloquent\EloquentUserModel;

final class LanguageModel extends Model implements Favoriteable
{
    protected $table = 'languages';

    public function user(): BelongsTo
    {
        return $this->belongsTo(EloquentUserModel::class, 'user_id');
    }
}
