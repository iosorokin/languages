<?php

namespace Modules\Domain\Sentences\Entities;

use App\Base\Entity\Identify\HasIntId;
use App\Base\Entity\Timestamps\HasTimestamps;
use Modules\Container\Contracts\ContainerableElement;

interface Sentence extends
    HasIntId,
    HasTimestamps,

    ContainerableElement
{
    public function setText(string $text): self;

    public function getText(): string;
}
