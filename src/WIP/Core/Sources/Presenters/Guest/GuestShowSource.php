<?php

declare(strict_types=1);

namespace WIP\Core\Sources\Presenters\Guest;

use WIP\Core\Sources\Presenters\Mixins\ShowSource;
use WIP\Core\Sources\Structures\Source;

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
