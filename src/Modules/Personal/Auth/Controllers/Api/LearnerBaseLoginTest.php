<?php

namespace Modules\Personal\Auth\Controllers\Api;

use App\Contracts\Presenters\Notification\Mailer\SendLearnerRegistrationEmailPresenter;
use App\Contracts\Presenters\Personal\Auth\CreateBaseAuthPresenter;
use App\Contracts\Presenters\Personal\Learner\CreateLearnerPresenter;
use App\Contracts\Presenters\Personal\User\CreateUserPresenter;
use Core\Test\Actions\Personal\LearnerAction;
use Core\Test\EndpointCase;
use Modules\Personal\Learner\Actions\SaveRegisteredLearner;
use Modules\Personal\Learner\Presenters\RegisterLearner;

class LearnerBaseLoginTest extends EndpointCase
{
    use LearnerAction;

    private RegisterLearner $registerLearner;

    protected function setUp(): void
    {
        parent::setUp();

        $this->registerLearner = new RegisterLearner(
            createUser: app(CreateUserPresenter::class),
            createBaseAuth: app(CreateBaseAuthPresenter::class),
            createLearner: app(CreateLearnerPresenter::class),
            saveRegisteredLearner: app(SaveRegisteredLearner::class),
            sendLearnerRegistrationEmail: app(SendLearnerRegistrationEmailPresenter::class),
        );
    }

    /**
     * @test
     */
    public function __invoke()
    {
        $attributes = $this->generateLearnerAttributes();
        ($this->registerLearner)($attributes);
        $response = $this->loginLearnerWithApi([
            'email' => $attributes['email'],
            'password' => $attributes['password']
        ]);
        $response->assertOk();
    }
}
