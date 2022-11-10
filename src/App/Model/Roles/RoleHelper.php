<?php

declare(strict_types=1);

namespace App\Model\Roles;

use App\Base\Helpers\ModuleHelper;
use App\Model\Values\Identificatiors\Id\BigIntId;

final class RoleHelper extends ModuleHelper
{
    public static function createRoot(): Root
    {
        return new RootImp(BigIntId::new(1));
    }

    public static function createManager(): ContentManager
    {
        return new ContentManagerImp(BigIntId::new(1));
    }

    public static function createStudent(): Student
    {
        return new StudentImp();
    }
}
