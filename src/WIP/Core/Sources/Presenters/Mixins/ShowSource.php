<?php

declare(strict_types=1);

namespace WIP\Core\Sources\Presenters\Mixins;

use WIP\Core\Sources\Presenters\Internal\GetSource;
use WIP\Core\Sources\Structures\Source;

final class ShowSource
{
    public function __construct(
        private GetSource  $getSource,
    ) {}

    public function __invoke(int $sourceId): Source
    {
        $source = $this->getSource->getOrThrowNotFound($sourceId);

        return $source;
    }
}
