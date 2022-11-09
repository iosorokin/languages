<?php

declare(strict_types=1);

namespace Domain\Core\Analysis\Presenters;

use Domain\Core\Analysis\Actions\CreateAnalysis;
use Domain\Core\Analysis\Model\Analysis;
use Domain\Personal\Account\Queries\GetUser;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

final class SeedAnalysis
{
    public function __construct(
        private GetUser $getUser,
        private CreateAnalysis $createAnalysis,
    ) {}

    public function __invoke(EloquentUserModel|int $user, array $attributes): Analysis
    {
        $user = is_int($user) ? ($this->getUser)($user) : $user;
        $attributes['user_id'] = $user->getId();

        return ($this->createAnalysis)($user, $attributes);
    }
}
