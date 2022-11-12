<?php

declare(strict_types=1);

namespace WIP\Core\Sources\Presenters\Guest\Items;

use WIP\Core\Sources\Presenters\Internal\GetSource;

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
