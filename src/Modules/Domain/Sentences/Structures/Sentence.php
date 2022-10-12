<?php

namespace Modules\Domain\Sentences\Structures;

use App\Base\Structures\Identify\HasIntId;
use App\Base\Structures\Timestamps\HasTimestamps;
use Modules\Domain\Sources\Structures\HasSource;
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
