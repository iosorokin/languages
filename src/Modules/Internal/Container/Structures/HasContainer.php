<?php

namespace Modules\Internal\Container\Structures;

interface HasContainer
{
    public function setContainer(Container $container): self;

    public function getContainer(): Container;
}
