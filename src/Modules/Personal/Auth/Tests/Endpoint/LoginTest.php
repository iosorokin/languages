<?php

namespace Modules\Personal\Auth\Tests\Endpoint;

use Core\Test\Actions\Personal\LearnerAction;
use Core\Test\EndpointCase;
use Modules\Notification\Mailer\Presenters\SendLearnerRegistrationEmail;
use Modules\Personal\Auth\Presenters\Base\CreateBaseAuth;
use Modules\Personal\Guest;
use Modules\Personal\Learner\Actions\CreateLearner;
use Modules\Personal\Learner\Presenters\RegisterLearner;
use Modules\Personal\Learner\Repositories\LearnerRepository;
use Modules\Personal\User\Presenters\CreateUser;

class LoginTest extends EndpointCase
{
    use LearnerAction;

    private RegisterLearner $registerLearner;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockSendLearnRegistrationEmail();

        $this->registerLearner = new RegisterLearner(
            newUser: app(CreateUser::class),
            newBaseAuth: app(CreateBaseAuth::class),
            createLearner: app(CreateLearner::class),
            learnerRepository: app(LearnerRepository::class),
            sendLearnerRegistrationEmail: app(SendLearnerRegistrationEmail::class),
        );
    }

    /**
     * @test
     */
    public function __invoke()
    {
        $attributes = $this->generateLearnerAttributes();
        $learner = ($this->registerLearner)(new Guest(), $attributes);
        $response = $this->learnerLoginWithApi([
            'email' => $learner->baseAuth->email,
            'password' => $attributes['password']
        ]);
        $response->assertOk();
    }
}
