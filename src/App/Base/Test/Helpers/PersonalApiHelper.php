<?php

declare(strict_types=1);

namespace App\Base\Test\Helpers;

use Illuminate\Testing\TestResponse;
use WIP\Personal\Account\Helpers\Test\AccountSeedHelper;
use WIP\Personal\Account\Helpers\Test\BaseAuthSeedHelper;

final class PersonalApiHelper extends ApiHelper
{
    public function register(array $attributes = []): TestResponse
    {
        $attributes = AccountSeedHelper::new()->generateStoreAttributes()
            + BaseAuthSeedHelper::new()->generateAttributes()
            + $attributes;

        return $this->testCase->postJson(route('api.users.store'), $attributes);
    }
}
