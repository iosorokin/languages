<?php

declare(strict_types=1);

namespace Modules\Personal\User\Helpers;

use Core\Base\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;
use Modules\Personal\Auth\Helpers\BaseAuthSeedHelper;

final class UserApiHelper extends ApiHelper
{
    public function register(array $attributes = []): TestResponse
    {
        $attributes = UserSeedHelper::new()->generateAttributes()
            + BaseAuthSeedHelper::new()->generateAttributes()
            + $attributes;

        return $this->testCase->postJson(route('api.users.store'), $attributes);
    }
}
