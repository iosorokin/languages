<?php

namespace Modules\Domain\Chapters\Policies;

use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\Auth\Contexts\Client;

interface ChapterPolicy
{
    public function canCreate(Client$client, Source $source): void;
}
