<?php

declare(strict_types=1);

namespace Infrastructure\Database\Repositories\Eloquent\Language\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use WIP\Internal\Favorites\Contracts\Favoriteable;

final class LanguageModel extends Model implements Favoriteable
{
    protected $table = 'languages';

    public function user(): BelongsTo
    {
        return $this->belongsTo(EloquentUserModel::class, 'user_id');
    }
}
