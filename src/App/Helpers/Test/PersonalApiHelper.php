<?php

declare(strict_types=1);

namespace App\Helpers\Test;

use App\Base\Helpers\ApiHelper;
use Domain\Personal\Helpers\BaseAuthSeedHelper;
use Domain\Personal\Helpers\UserSeedHelper;
use Illuminate\Testing\TestResponse;

final class PersonalApiHelper extends ApiHelper
{
    public function register(array $attributes = []): TestResponse
    {
        $attributes = UserSeedHelper::new()->generateStoreAttributes()
            + BaseAuthSeedHelper::new()->generateAttributes()
            + $attributes;

        return $this->testCase->postJson(route('api.users.store'), $attributes);
    }
}
