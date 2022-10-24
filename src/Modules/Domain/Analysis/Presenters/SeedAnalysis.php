<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Presenters;

use Modules\Domain\Analysis\Actions\CreateAnalysis;
use Modules\Domain\Analysis\Model\Analysis;
use Modules\Personal\User\Model\User;
use Modules\Personal\User\Presenters\Internal\GetUser;

final class SeedAnalysis
{
    public function __construct(
        private GetUser $getUser,
        private CreateAnalysis $createAnalysis,
    ) {}

    public function __invoke(User|int $user, array $attributes): Analysis
    {
        $user = is_int($user) ? ($this->getUser)($user) : $user;
        $attributes['user_id'] = $user->getId();

        return ($this->createAnalysis)($user, $attributes);
    }
}
