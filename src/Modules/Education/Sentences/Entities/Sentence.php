<?php

namespace Modules\Education\Sentences\Entities;

use App\Base\Entity\Identify\HasIntId;
use App\Base\Entity\Timestamps\HasTimestamps;
use Modules\Container\Contracts\ContainerableElement;
use Modules\Container\Entites\HasContainer;

interface Sentence extends
    HasIntId,
    HasTimestamps,

    ContainerableElement
{
    public function setText(string $text): self;

    public function getText(): string;
}
