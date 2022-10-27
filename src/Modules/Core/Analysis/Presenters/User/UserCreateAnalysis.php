<?php

declare(strict_types=1);

namespace Modules\Core\Analysis\Presenters\User;

use App\Controllers\Auth\Internal\GetAuthUser;
use Modules\Core\Analysis\Actions\CreateAnalysis;
use Modules\Core\Analysis\Model\Analysis;

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
