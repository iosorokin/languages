<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Tests;

use App\Extensions\Assert;
use Core\Test\EndpointCase;
use Core\Test\Helpers\Helper;
use Illuminate\Testing\TestResponse;

final class BaseAuthApiHelper extends Helper
{
    public const SEEDED_TEST_LEARNER = [
        'email' => 'test@email.ru',
        'password' => 'testpassword',
    ];

    public function __construct(
        private BaseAuthHelper $baseAuthModuleHelper,
    ) {}

    public function loginLearner(EndpointCase $testCase, array $attributes): TestResponse
    {
        return $testCase->postJson(route('api.learners.login'), $attributes);
    }

    public function logoutLearner(EndpointCase $testCase): TestResponse
    {
        $response = $testCase->postJson(route('api.learners.logout'));
        $testCase->withHeader('Authorization', '');

        return $response;
    }

    public function loginAsTestLearner(EndpointCase $testCase): TestResponse
    {
        $response = $this->loginLearner($testCase, [
            'email' => self::SEEDED_TEST_LEARNER['email'],
            'password' => self::SEEDED_TEST_LEARNER['password'],
        ]);
        $token = $response->json('data.token');
        Assert::notNull($token);

        $testCase->withHeader('Authorization', 'Bearer '. $token);

        return $response;
    }

    public function defaultAttributes(): array
    {
        return $this->baseAuthModuleHelper->generateAttributes();
    }
}
