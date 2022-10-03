<?php

namespace Modules\Container\Entites;

interface HasContainer
{
    public function setContainer(Container $container): self;

    public function getContainer(): Container;

}
