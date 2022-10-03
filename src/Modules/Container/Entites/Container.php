<?php

namespace Modules\Container\Entites;

use App\Base\Entity\HasDescription;
use App\Base\Entity\HasTitle;
use App\Base\Entity\Identify\HasIntId;
use App\Base\Entity\Timestamps\HasTimestamps;
use Modules\Container\Contracts\Containerable;
use Modules\Container\Enums\ContainerType;

interface Container extends
    HasIntId,
    HasTimestamps,
    HasTitle,
    HasDescription
{
    public function setContainerable(Containerable $containerable): self;

    public function getContainerable(): Containerable;

    public function setType(ContainerType $type): self;

    public function getType(): ContainerType;
}
