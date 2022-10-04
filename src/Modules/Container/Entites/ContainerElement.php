<?php

namespace Modules\Container\Entites;

use App\Base\Entity\Identify\HasIntId;
use App\Base\Entity\Timestamps\HasTimestamps;
use Modules\Container\Contracts\ContainerableElement;

interface ContainerElement extends
    HasIntId,
    HasTimestamps,
    HasContainer
{
    public function setElement(ContainerableElement $element): self;

    public function getElement(): ContainerableElement;

    public function setPosition(int $position): self;

    public function getPosition(): int;
}
