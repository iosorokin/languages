<?php

namespace Modules\Container\Entites;

use App\Base\Entity\HasDescription;
use App\Base\Entity\HasTitle;
use App\Base\Entity\Identify\HasIntId;
use App\Base\Entity\Timestamps\HasTimestamps;
use Illuminate\Support\Collection;
use Modules\Container\Contracts\Containerable;
use Modules\Container\Contracts\ContainerableElement;
use Modules\Container\Enums\ContainerType;

interface Container extends
    HasIntId,
    HasTimestamps,
    HasTitle,
    HasDescription,

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
