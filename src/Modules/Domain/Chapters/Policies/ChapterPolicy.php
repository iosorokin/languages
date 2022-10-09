<?php

namespace Modules\Domain\Chapters\Policies;

use Modules\Domain\Sources\Entities\Source;
use Modules\Personal\Auth\Contexts\Client;

interface ChapterPolicy
{
    public function canCreate(Client$client, Source $source): void;
}
