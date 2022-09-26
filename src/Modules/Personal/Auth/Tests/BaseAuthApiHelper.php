<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Tests;

use App\Extensions\Assert;
use Core\Test\EndpointCase;
use Core\Test\Helpers\ApiHelper;
use Core\Test\Helpers\Helper;
use Illuminate\Testing\TestResponse;

final class BaseAuthApiHelper extends ApiHelper
{
    public const SEEDED_TEST_LEARNER = [
        'email' => 'test@email.ru',
        'password' => 'testpassword',
    ];

    public function loginLearner(array $attributes): TestResponse
    {
        return $this->testCase->postJson(route('api.learners.login'), $attributes);
    }

    public function logoutLearner(): TestResponse
    {
        $response = $this->testCase->postJson(route('api.learners.logout'));
        $this->testCase->withHeader('Authorization', '');

        return $response;
    }

    public function loginAsTestLearner(): TestResponse
    {
        $response = $this->loginLearner([
            'email' => self::SEEDED_TEST_LEARNER['email'],
            'password' => self::SEEDED_TEST_LEARNER['password'],
        ]);
        $token = $response->json('data.token');
        Assert::notNull($token);

        $this->testCase->withHeader('Authorization', 'Bearer '. $token);

        return $response;
    }

    public function defaultAttributes(): array
    {
        return BaseAuthHelper::new()->generateAttributes();
    }
}
