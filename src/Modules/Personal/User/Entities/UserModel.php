<?php

declare(strict_types=1);

namespace Modules\Personal\User\Entities;

use App\Base\Entity\Identify\EloquentId;
use App\Base\Entity\Timestamps\EloquentTimestamps;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\HasApiTokens;
use Modules\Personal\Auth\Entity\BaseAuth;
use Modules\Personal\Auth\Entity\BaseAuthModel;

final class UserModel extends Model implements
    Authenticatable,
    User
{
    use \Illuminate\Auth\Authenticatable;
    use HasApiTokens;
    use EloquentId;
    use EloquentTimestamps;

    protected $table = 'users';

    private function baseAuth(): HasOne
    {
        return $this->hasOne(BaseAuthModel::class);
    }

    public function getBaseAuth(): BaseAuth
    {
        return $this->baseAuth;
    }

    public function setName(string $name): User
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
