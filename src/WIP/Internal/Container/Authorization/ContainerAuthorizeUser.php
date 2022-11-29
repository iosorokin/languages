<?php

declare(strict_types=1);

namespace WIP\Internal\Container\Authorization;


use Core\Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent\EloquentUserModel;

final class ContainerAuthorizeUser
{
    public function canCreate(EloquentUserModel $user): void
    {

    }
}
