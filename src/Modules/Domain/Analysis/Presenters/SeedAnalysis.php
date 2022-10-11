<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Presenters;

use Modules\Domain\Analysis\Actions\CreateAnalysis;
use Modules\Domain\Analysis\Entities\Analysis;
use Modules\Personal\Auth\Presenters\GetClientPresenter;
use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Presenters\Internal\GetUserPresenter;

final class SeedAnalysis
{
    public function __construct(
        private GetUserPresenter $getUser,
        private GetClientPresenter $getClient,
        private CreateAnalysis $createAnalysis,
    ) {}

    public function __invoke(User|int $user, array $attributes): Analysis
    {
        $user = is_int($user) ? ($this->getUser)($user) : $user;
        $client = ($this->getClient)($user);
        $attributes['user_id'] = $user->getId();

        return ($this->createAnalysis)($client, $attributes);
    }
}
