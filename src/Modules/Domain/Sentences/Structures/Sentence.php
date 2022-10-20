<?php

namespace Modules\Domain\Sentences\Structures;

use App\Base\Structure\Identify\HasIntId;
use App\Base\Structure\Timestamps\HasTimestamps;
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
