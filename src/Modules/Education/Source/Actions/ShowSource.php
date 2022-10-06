<?php

declare(strict_types=1);

namespace Modules\Education\Source\Actions;

use Modules\Education\Source\Entities\Source;
use Modules\Education\Source\Policies\SourcePolicy;
use Modules\Education\Source\Repositories\SourceRepository;
use Modules\Education\Source\Validators\ShowSourceValidator;
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
