<?php

declare(strict_types=1);

namespace WIP\Core\Analysis\Presenters;

use Core\Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent\EloquentUserModel;
use WIP\Core\Analysis\Actions\CreateAnalysis;
use WIP\Core\Analysis\Model\Analysis;
use WIP\Personal\Account\Queries\GetUser;

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
