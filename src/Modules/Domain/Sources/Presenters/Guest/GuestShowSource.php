<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters\Guest;

use Modules\Domain\Sources\Presenters\Mixins\ShowSource;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class GuestShowSource implements GuestShowSourcePresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private ShowSource         $showSource,
    ) {}

    public function __invoke(int $sourceId): Source
    {
        $client = ($this->getClient)();
        $source = ($this->showSource)($client, $sourceId);

        return $source;
    }
}
