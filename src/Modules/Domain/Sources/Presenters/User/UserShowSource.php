<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters\User;

use Modules\Domain\Sources\Actions\ShowSource;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class UserShowSource implements UserShowSourcePresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private ShowSource     $showSource,
    ) {}

    public function __invoke(int $sourceId): Source
    {
        $client = ($this->getClient)();
        $source = ($this->showSource)($client, $sourceId);

        return $source;
    }
}
