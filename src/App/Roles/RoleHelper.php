<?php

declare(strict_types=1);

namespace App\Roles;

use App\Base\Helpers\ModuleHelper;
use App\Values\Identificatiors\Id\BigIntId;

final class RoleHelper extends ModuleHelper
{
    public static function createManager(): ContentManager
    {
        return new ContentManagerImp(BigIntId::new(1));
    }
}
