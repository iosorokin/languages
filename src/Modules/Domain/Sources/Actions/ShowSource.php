<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Actions;

use Modules\Domain\Sources\Structures\Source;
use Modules\Domain\Sources\Policies\SourcePolicy;
use Modules\Domain\Sources\Repositories\SourceRepository;
use Modules\Personal\Auth\Contexts\Client;

final class ShowSource
{
    public function __construct(
        private SourceRepository $repository,
        private SourcePolicy $policy,
    ) {}

    public function __invoke(Client $client, int $sourceId): Source
    {
        $source = $this->repository->get($sourceId);
        $this->policy->canShow($client, $source);

        return $source;
    }
}
