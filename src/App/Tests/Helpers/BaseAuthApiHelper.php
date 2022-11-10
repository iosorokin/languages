<?php

declare(strict_types=1);

namespace App\Tests\Helpers;

use App\Base\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;

final class BaseAuthApiHelper extends ApiHelper
{
    public function login(array $attributes): TestResponse
    {
        $response = $this->testCase->postJson(route('api.login'), $attributes);
        $token = $response->json('data.token');
        if (is_null($token)) {
            $response->dd();
        }

        $this->testCase->withHeader('Authorization', 'Bearer '. $token);

        return $response;
    }

    public function logout(): TestResponse
    {
        $response = $this->testCase->postJson(route('api.user.logout'));
        $this->testCase->withHeader('Authorization', '');

        return $response;
    }

    public function loginAsTestSuperAdmin(): TestResponse
    {
        $response = $this->login([
            'email' => config('seed.users.super_admin.email'),
            'password' => config('seed.users.super_admin.password'),
        ]);

        return $response;
    }

    public function loginAsTestUser(): TestResponse
    {
        $response = $this->login([
            'email' => config('seed.users.test_user.email'),
            'password' => config('seed.users.test_user.password'),
        ]);

        return $response;
    }
}
