<?php

namespace Core\Test\Actions\Personal;

use App\Extensions\Assert;
use Illuminate\Testing\TestResponse;

trait LearnerAction
{
    use UserAction;
    use BaseAuthAction;

    public string $testEmail = 'test@email.ru';
    public string $testPassword = 'testpassword';

    public function createStudentByApi(array $attributes = []): TestResponse
    {
        $attributes = $this->generateLearnerAttributes() + $attributes;

        return $this->post(route('api.learners.create'), $attributes);
    }

    public function loginAsTestLearnerByApi(): void
    {
        $response = $this->loginLearnerWithApi([
            'email' => $this->testEmail,
            'password' => $this->testPassword,
        ]);

        $token = $response->json('data.token');
        Assert::notNull($token);

        $this->withHeader('Authorization', 'Bearer '. $token);
    }

    public function generateLearnerAttributes(): array
    {
        $user = $this->getCreateUserParams();
        $baseAuth = $this->generateBaseAuthAttributes();
        $student = [

        ];

        return $user + $baseAuth + $student;
    }
}
