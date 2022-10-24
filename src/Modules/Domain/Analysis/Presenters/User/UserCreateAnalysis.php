<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Presenters\User;

use Modules\Domain\Analysis\Actions\CreateAnalysis;
use Modules\Domain\Analysis\Model\Analysis;
use Modules\Personal\Auth\Presenters\Internal\GetAuthUser;

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
