<?php

declare(strict_types=1);

namespace App\Base\Model\Roles;

use App\Base\Model\Values\Identificatiors\Id\BigIntId;
use App\Base\Test\Helpers\ModuleHelper;

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
        return new StudentImp(BigIntId::new(1));
    }
}
