<?php

declare(strict_types=1);

namespace Domain\Core\Source\Student\Model\Aggregate;

use Domain\Core\Source\Student\Controll\Command\CreateSource;

final class StudentSourceFactory
{
    public static function create(CreateSource $command): StudentSource
    {

    }
}
