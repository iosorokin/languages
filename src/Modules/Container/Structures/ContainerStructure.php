<?php

namespace Modules\Container\Structures;

use Modules\Container\Contracts\Containerable;
/**
 * @property int $id
 * @property string $containerable_type
 * @property int $containerable_id
 * @property null|string $title
 * @property null|string $description
 */
interface ContainerStructure
{
    public function setContainerable(Containerable $containerable): self;

    public function getContainerable(): Containerable;
}
