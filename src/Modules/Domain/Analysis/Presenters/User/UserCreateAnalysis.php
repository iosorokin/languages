<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Presenters\User;

use Modules\Domain\Analysis\Actions\CreateAnalysis;
use Modules\Domain\Analysis\Entities\Analysis;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class UserCreateAnalysis implements UserCreateAnalysisPresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private CreateAnalysis $createAnalysis,
    ) {}

    public function __invoke(array $attributes): Analysis
    {
        $client = ($this->getClient)();
        $attributes['user_id'] = $client->id();
        $analysis = ($this->createAnalysis)($client, $attributes);

        return $analysis;
    }
}
