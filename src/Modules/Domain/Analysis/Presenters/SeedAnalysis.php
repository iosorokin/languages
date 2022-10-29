<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Presenters;

use Modules\Domain\Analysis\Actions\CreateAnalysis;
use Modules\Domain\Analysis\Model\Analysis;
use Modules\Personal\App\Presenters\Personal\Internal\GetUser;
use Modules\Personal\Infrastructure\Repository\Eloquent\EloquentUserModel;

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