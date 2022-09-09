<?php

declare(strict_types=1);

namespace Modules\Personal\Learner\Presenters;

use App\Contracts\Client;
use App\Contracts\Presenters\Notification\Mailer\SendLearnerRegistrationEmailPresenter;
use App\Contracts\Presenters\Personal\Auth\CreateBaseAuthPresenter;
use App\Contracts\Presenters\Personal\Learner\RegisterLearnerPresenter;
use App\Contracts\Presenters\Personal\User\CreateUserPresenter;
use App\Contracts\Structures\AuthableStructure;
use App\Contracts\Structures\Personal\LearnerStructure;
use App\Contracts\Structures\Personal\UserStructure;
use Modules\Personal\Learner\Actions\SaveRegisteredLearner;

final class RegisterLearner implements RegisterLearnerPresenter
{
    public function __construct(
        private CreateUserPresenter                   $createUser,
        private CreateBaseAuthPresenter               $createBaseAuth,
        private CreateLearner                         $createLearner,
        private SaveRegisteredLearner                 $saveRegisteredLearner,
        private SendLearnerRegistrationEmailPresenter $sendLearnerRegistrationEmail,
    ) {}

    public function __invoke(array $attributes): LearnerStructure
    {
        $user = ($this->createUser)($attributes);
        $learner = ($this->createLearner)($user, $attributes);
        $baseAuth = ($this->createBaseAuth)($learner, $attributes);

        ($this->saveRegisteredLearner)($user, $learner, $baseAuth);
        ($this->sendLearnerRegistrationEmail)($learner);

        return $learner;
    }
}
