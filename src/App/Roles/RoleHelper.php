<?php

declare(strict_types=1);

namespace App\Roles;

use App\Base\Helpers\AppHelper;
use App\Values\Identificatiors\Id\BigIntId;

final class RoleHelper extends AppHelper
{
    public static function createManager(): ContentManager
    {
        return new ContentManagerImp(BigIntId::new(1));
    }
}
