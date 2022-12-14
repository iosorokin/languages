<?php

declare(strict_types=1);

namespace Core\Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\HasApiTokens;

final class EloquentUserModel extends Model
{
    use HasApiTokens;

    protected $table = 'users';

    protected $fillable = [
        'id',
        'name',
        'roles',
    ];

    protected $casts = [
        'roles' => 'array',
    ];

    public function baseAuth(): HasOne
    {
        return $this->hasOne(EloquentBaseAuthModel::class, 'user_id');
    }
}
