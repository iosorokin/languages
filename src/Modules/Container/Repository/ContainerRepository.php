<?php

namespace Modules\Container\Repository;

use Modules\Container\Structures\ContainerStructure;

interface ContainerRepository
{
    public function save(ContainerStructure $container): void;
}
