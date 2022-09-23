<?php

declare(strict_types=1);

namespace Modules\Container\Structures;

use Modules\Container\Contracts\Containerable;

final class Container implements ContainerStructure
{
    private int $firstPosition;

    private int $lastPosition;

    private int $step;

    private Containerable $containerable;

    public function setContainerable(Containerable $containerable): ContainerStructure
    {
        $this->containerable = $containerable;

        return $this;
    }

    public function getContainerable(): Containerable
    {
        return $this->containerable;
    }


}
