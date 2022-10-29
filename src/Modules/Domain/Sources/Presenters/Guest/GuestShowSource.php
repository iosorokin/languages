<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters\Guest;

use Modules\Domain\Sources\Presenters\Mixins\ShowSource;
use Modules\Domain\Sources\Structures\Source;

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
