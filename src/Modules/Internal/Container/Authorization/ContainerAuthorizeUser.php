<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Authorization;


use App\Database\Personal\EloquentUserModel;

final class ContainerAuthorizeUser
{
    public function canCreate(EloquentUserModel $user): void
    {

    }
}
