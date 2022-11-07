<?php

declare(strict_types=1);

namespace Domain\Core\Sources\Presenters\Mixins;

use Domain\Core\Sources\Presenters\Internal\GetSource;
use Domain\Core\Sources\Structures\Source;

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
