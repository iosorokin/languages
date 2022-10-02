<?php

declare(strict_types=1);

namespace Modules\Personal\User\Tests;

use Core\Base\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;
use Modules\Personal\Auth\Tests\BaseAuthHelper;

final class UserApiHelper extends ApiHelper
{
    public function register(array $attributes = []): TestResponse
    {
        $attributes = UserHelper::new()->generateAttributes()
            + BaseAuthHelper::new()->generateAttributes()
            + $attributes;

        return $this->testCase->postJson(route('api.users.store'), $attributes);
    }
}
