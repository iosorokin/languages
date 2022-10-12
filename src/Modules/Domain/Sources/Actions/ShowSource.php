<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Actions;

use Modules\Domain\Sources\Structures\Source;
use Modules\Domain\Sources\Policies\SourcePolicy;
use Modules\Domain\Sources\Repositories\SourceRepository;
use Modules\Domain\Sources\Validators\ShowSourceValidator;
use Modules\Personal\Auth\Contexts\Client;

final class ShowSource
{
    public function __construct(
        private ShowSourceValidator $validator,
        private SourceRepository $repository,
        private SourcePolicy $policy,
    ) {}

    public function __invoke(Client $client, array $attributes): Source
    {
        $attributes = $this->validator->validate($attributes);
        $source = $this->repository->get((int) $attributes['source_id']);
        $this->policy->canShow($client, $source);

        return $source;
    }
}
