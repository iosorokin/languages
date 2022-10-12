<?php

namespace Modules\Internal\Container\Structures;

use App\Base\Structures\HasDescription;
use App\Base\Structures\HasTitle;
use App\Base\Structures\Identify\HasIntId;
use App\Base\Structures\Timestamps\HasTimestamps;
use Illuminate\Support\Collection;
use Modules\Internal\Container\Contracts\Containerable;
use Modules\Internal\Container\Contracts\ContainerableElement;
use Modules\Internal\Container\Enums\ContainerType;

interface Container extends
    HasIntId,
    HasTimestamps,
    HasTitle,
    HasDescription,

    Containerable,
    ContainerableElement
{
    public function setContainerable(Containerable $containerable): self;

    public function getContainerable(): Containerable;

    public function setType(ContainerType $type): self;

    public function getType(): ContainerType;

    public function addElement(ContainerElement $element): self;

    public function setElements(Collection $elements): self;

    public function getElements(): Collection;

    public function setLastPosition(?int $pos): self;

    public function getLastPosition(): ?int;

    public function setCount(int $count): self;

    public function getCount(): int;
}
