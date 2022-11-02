<?php

declare(strict_types=1);

namespace Domain\Analysis\Presenters;

use Domain\Personal\Actions\Common\GetUser;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Domain\Analysis\Actions\CreateAnalysis;
use Domain\Analysis\Model\Analysis;

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
