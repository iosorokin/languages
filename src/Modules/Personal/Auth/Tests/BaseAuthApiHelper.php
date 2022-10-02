<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Tests;

use App\Extensions\Assert;
use Core\Base\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;

final class BaseAuthApiHelper extends ApiHelper
{
    public const SEEDED_TEST_USER = [
        'email' => 'test@email.ru',
        'password' => 'testpassword',
    ];

    public function login(array $attributes): TestResponse
    {
        return $this->testCase->postJson(route('api.login'), $attributes);
    }

    public function logout(): TestResponse
    {
        $response = $this->testCase->postJson(route('api.user.logout'));
        $this->testCase->withHeader('Authorization', '');

        return $response;
    }

    public function loginAsTestUser(): TestResponse
    {
        $response = $this->login([
            'email' => self::SEEDED_TEST_USER['email'],
            'password' => self::SEEDED_TEST_USER['password'],
        ]);
        $token = $response->json('data.token');
        if (is_null($token)) {
            $response->dd();
        }

        $this->testCase->withHeader('Authorization', 'Bearer '. $token);

        return $response;
    }
}
