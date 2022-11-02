<?php

declare(strict_types=1);

namespace Domain\Sources\Presenters\Guest\Items;

use Domain\Sources\Presenters\Internal\GetSource;

final class GuestIndexSourceItems
{
    public function __construct(
        private GetSource  $getSource,
    ) {}

    public function __invoke(int $sourceId, array $attributes)
    {
        $source = $this->getSource->getOrThrowNotFound($sourceId);
    }
}
