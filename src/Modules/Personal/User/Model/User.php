<?php

declare(strict_types=1);

namespace Modules\Personal\User\Model;

use App\Base\Structure\Identify\IntId;
use App\Base\Structure\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Queue\SerializesModels;
use Laravel\Sanctum\HasApiTokens;
use Modules\Personal\Auth\Model\BaseAuth;
use Modules\Personal\User\Values\Roles;

/**
 * @property Roles $roles
 */
final class User extends Model
{
    use SerializesModels;
    use HasApiTokens;
    use IntId;
    use Timestamps;

    protected function roles(): Attribute
    {
        return Attribute::make(
            get: fn (string $roles) => new Roles(json_decode($roles)),
            set: fn (Roles $roles) => json_encode($roles->toArray()),
        );
    }

    public function baseAuth(): HasOne
    {
        return $this->hasOne(BaseAuth::class);
    }
}
