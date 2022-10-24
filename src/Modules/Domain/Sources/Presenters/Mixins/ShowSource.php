<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters\Mixins;

use Modules\Domain\Sources\Presenters\Internal\GetSource;
use Modules\Domain\Sources\Structures\Source;

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
