<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters\Guest\Items;

use Modules\Domain\Sources\Presenters\Internal\GetSource;

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
