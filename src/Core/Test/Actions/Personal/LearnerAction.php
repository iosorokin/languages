<?php

namespace Core\Test\Actions\Personal;

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

    public function generateLearnerAttributes(): array
    {
        $user = $this->getCreateUserParams();
        $baseAuth = $this->generateBaseAuthAttributes();
        $student = [

        ];

        return $user + $baseAuth + $student;
    }
}
