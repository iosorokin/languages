<?php

declare(strict_types=1);

namespace App\Helpers\Test;

use Core\Base\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;

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
