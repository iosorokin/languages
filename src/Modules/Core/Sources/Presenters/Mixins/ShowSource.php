<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Presenters\Mixins;

use Modules\Core\Sources\Presenters\Internal\GetSource;
use Modules\Core\Sources\Structures\Source;

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
