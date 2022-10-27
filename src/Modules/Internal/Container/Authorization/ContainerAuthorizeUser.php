<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Authorization;


use Modules\Personal\Infrastructure\Repository\EloquentUserModel;

final class ContainerAuthorizeUser
{
    public function canCreate(EloquentUserModel $user): void
    {

    }
}
