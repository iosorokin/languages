<?php

namespace Modules\Internal\Container\Structures;

use App\Base\Structures\Identify\HasIntId;
use App\Base\Structures\Timestamps\HasTimestamps;
use Modules\Internal\Container\Contracts\ContainerableElement;

interface ContainerElement extends
    HasIntId,
    HasTimestamps
{
    public function setContainer(Container $container): self;

    public function getContainer(): Container;

    public function setElement(ContainerableElement $element): self;

    public function getElement(): ContainerableElement;

    public function setPosition(int $position): self;

    public function getPosition(): int;
}
