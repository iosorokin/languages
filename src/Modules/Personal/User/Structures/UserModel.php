<?php

declare(strict_types=1);

namespace Modules\Personal\User\Structures;

use App\Base\Structure\Identify\IntId;
use App\Base\Structure\Timestamps\Timestamps;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Queue\SerializesModels;
use Laravel\Sanctum\HasApiTokens;
use Modules\Personal\Auth\Structures\BaseAuth;
use Modules\Personal\Auth\Structures\BaseAuthModel;
use Modules\Personal\Permissions\Structures\Permission;
use Modules\Personal\Permissions\Structures\PermissionModel;

final class UserModel extends Model implements
    Authenticatable,
    User
{
    use SerializesModels;
    use \Illuminate\Auth\Authenticatable;
    use HasApiTokens;
    use IntId;
    use Timestamps;

    protected $table = 'users';

    public function baseAuth(): HasOne
    {
        return $this->hasOne(BaseAuthModel::class);
    }

    public function getBaseAuth(): BaseAuth
    {
        return $this->baseAuth;
    }

    public function permission(): HasOne
    {
        return $this->hasOne(PermissionModel::class, 'user_id');
    }

    public function setPermission(Permission $permission): self
    {
        $this->permission = $permission;

        return $this;
    }

    public function getPermission(): Permission
    {
        return $this->permission;
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
