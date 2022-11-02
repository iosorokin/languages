<?php

declare(strict_types=1);

namespace Domain\Analysis\Presenters\User;

use App\Controllers\Auth\Internal\GetAuthUser;
use Domain\Analysis\Actions\CreateAnalysis;
use Domain\Analysis\Model\Analysis;

final class UserCreateAnalysis
{
    public function __construct(
        private GetAuthUser    $getAuthUser,
        private CreateAnalysis $createAnalysis,
    ) {}

    public function __invoke(array $attributes): Analysis
    {
        $auth = ($this->getAuthUser)();
        $attributes['user_id'] = $auth->id;
        $analysis = ($this->createAnalysis)($auth, $attributes);

        return $analysis;
    }
}
