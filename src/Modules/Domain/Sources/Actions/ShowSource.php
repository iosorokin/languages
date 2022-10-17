<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Actions;

use Modules\Domain\Sources\Presenters\Internal\GetSourcePresenter;
use Modules\Domain\Sources\Structures\Source;
use Modules\Domain\Sources\Policies\SourcePolicy;
use Modules\Personal\Auth\Contexts\Client;

final class ShowSource
{
    public function __construct(
        private GetSourcePresenter $getSource,
        private SourcePolicy       $policy,
    ) {}

    public function __invoke(Client $client, int $sourceId): Source
    {
        $source = $this->getSource->getOrThrowNotFound($sourceId);
        $this->policy->canShow($client, $source);

        return $source;
    }
}
