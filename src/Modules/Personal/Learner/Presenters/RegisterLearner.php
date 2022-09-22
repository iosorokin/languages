<?php

declare(strict_types=1);

namespace Modules\Personal\Learner\Presenters;

use App\Contracts\Presenters\Notification\Mailer\SendLearnerRegistrationEmailPresenter;
use App\Contracts\Presenters\Personal\Auth\CreateBaseAuthPresenter;
use App\Contracts\Presenters\Personal\Learner\RegisterLearnerPresenter;
use App\Contracts\Presenters\Personal\User\CreateUserPresenter;
use App\Contracts\Structures\LearnerStructure;
use Modules\Personal\Learner\Actions\CreateLearner;
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
        $learner = ($this->createLearner)($attributes);
        $baseAuth = ($this->createBaseAuth)($attributes);
        ($this->saveRegisteredLearner)($user, $learner, $baseAuth);
        ($this->sendLearnerRegistrationEmail)($learner);

        return $learner;
    }
}
