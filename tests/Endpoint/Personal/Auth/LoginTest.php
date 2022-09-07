<?php

namespace Tests\Endpoint\Personal\Auth;

use App\Presenters\Personal\Auth\Base\NewBaseAuth;
use App\Presenters\Personal\Learner\RegisterLearner;
use App\Presenters\Personal\Registration;
use App\Presenters\Personal\User\NewUser;
use App\Repositories\Personal\Learner\LearnerRepository;
use Illuminate\Support\Str;
use Mockery\MockInterface;
use Modules\Notification\Mailer\Actions\SendLearnerRegistrationEmail;
use Modules\Personal\Guest;
use Modules\Personal\Learner\Actions\CreateLearner;
use Tests\Actions\Personal\LearnerAction;
use Tests\Endpoint\EndpointCase;

class LoginTest extends EndpointCase
{
    use LearnerAction;

    private RegisterLearner $registerLearner;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockSendLearnRegistrationEmail();

        $this->registerLearner = new RegisterLearner(
            newUser: app(NewUser::class),
            newBaseAuth: app(NewBaseAuth::class),
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
