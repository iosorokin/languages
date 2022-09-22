<?php

declare(strict_types=1);

namespace Modules\Personal\Learner\Presenters;

use Modules\Notification\Mailer\Presenters\SendLearnerRegistrationEmailPresenter;
use Modules\Personal\Auth\Presenters\Base\CreateBaseAuthPresenter;
use Modules\Personal\Learner\Actions\CreateLearner;
use Modules\Personal\Learner\Actions\SaveRegisteredLearner;
use Modules\Personal\Learner\Structures\LearnerStructure;
use Modules\Personal\User\Presenters\CreateUserPresenter;

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
