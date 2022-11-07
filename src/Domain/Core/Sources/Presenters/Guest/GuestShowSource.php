<?php

declare(strict_types=1);

namespace Domain\Core\Sources\Presenters\Guest;

use Domain\Core\Sources\Presenters\Mixins\ShowSource;
use Domain\Core\Sources\Structures\Source;

final class GuestShowSource
{
    public function __construct(
        private ShowSource $showSource,
    ) {}

    public function __invoke(int $sourceId): Source
    {
        $source = ($this->showSource)($sourceId);

        return $source;
    }
}
