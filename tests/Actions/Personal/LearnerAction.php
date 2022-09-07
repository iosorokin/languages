<?php

namespace Tests\Actions\Personal;

use Illuminate\Testing\TestResponse;
use Mockery\MockInterface;
use Modules\Notification\Mailer\Actions\SendLearnerRegistrationEmail;

trait LearnerAction
{
    use UserAction;
    use BaseAuthAction;

    public function createStudentByApi(array $attributes = []): TestResponse
    {
        $attributes = $this->generateLearnerAttributes() + $attributes;

        return $this->post(route('learners.create'), $attributes);
    }

    public function generateLearnerAttributes(): array
    {
        $user = $this->getCreateUserParams();
        $baseAuth = $this->generateBaseAuthAttributes();
        $student = [

        ];

        return $user + $baseAuth + $student;
    }

    public function mockSendLearnRegistrationEmail(): void
    {
        $this->mock(SendLearnerRegistrationEmail::class, function (MockInterface $mock) {
            $mock->shouldReceive('__invoke')->andReturnNull();
        });
    }
}
