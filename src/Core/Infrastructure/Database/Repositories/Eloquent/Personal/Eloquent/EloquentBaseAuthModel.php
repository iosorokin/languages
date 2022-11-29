<?php

declare(strict_types=1);

namespace Core\Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class EloquentBaseAuthModel extends Model
{
    protected $table = 'base_auths';

    protected $fillable = [
        'email',
        'password',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(EloquentUserModel::class, 'user_id');
    }
}
