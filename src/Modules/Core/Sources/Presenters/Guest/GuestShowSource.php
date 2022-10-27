<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Presenters\Guest;

use Modules\Core\Sources\Presenters\Mixins\ShowSource;
use Modules\Core\Sources\Structures\Source;

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
