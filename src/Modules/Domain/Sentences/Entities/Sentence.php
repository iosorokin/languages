<?php

namespace Modules\Domain\Sentences\Entities;

use App\Base\Entity\Identify\HasIntId;
use App\Base\Entity\Timestamps\HasTimestamps;
use Modules\Domain\Sources\Entities\HasSource;
use Modules\Internal\Container\Contracts\ContainerableElement;

interface Sentence extends
    HasIntId,
    HasTimestamps,
    HasSource,

    ContainerableElement
{
    public function setText(string $text): self;

    public function getText(): string;
}
