<?php

namespace Modules\Container\Structures;

use Modules\Container\Contracts\Containerable;
use Modules\Container\Enums\ContainerType;

/**
 * @property int $id
 * @property string $containerable_type
 * @property int $containerable_id
 * @property ContainerType $container_type
 * @property null|string $title
 * @property null|string $description
 */
interface ContainerStructure
{
    public function setContainerable(Containerable $containerable): self;

    public function getContainerable(): Containerable;
}
