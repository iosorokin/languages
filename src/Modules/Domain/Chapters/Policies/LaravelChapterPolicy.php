<?php

declare(strict_types=1);

namespace Modules\Domain\Chapters\Policies;

use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\Auth\Contexts\Client;

final class LaravelChapterPolicy implements ChapterPolicy
{
    public function canCreate(Client $client, Source $source): void
    {
        // TODO: Implement canCreate() method.
    }
}
