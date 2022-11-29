<?php

declare(strict_types=1);

namespace Core\Base\Model\Roles;

use Core\Base\Model\Values\Identificatiors\Id\BigIntId;
use Core\Base\Test\Helpers\ModuleHelper;

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
