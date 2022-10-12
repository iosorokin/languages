<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters\Publics;

use Modules\Domain\Sources\Actions\ShowSource;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class PublicShowSource implements PublicShowSourcePresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private ShowSource     $showSource,
    ) {}

    public function __invoke(array $attributes): Source
    {
        $client = ($this->getClient)();
        $source = ($this->showSource)($client, $attributes);

        return $source;
    }
}
