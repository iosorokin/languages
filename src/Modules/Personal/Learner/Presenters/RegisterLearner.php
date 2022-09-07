<?php

namespace Modules\Personal\Learner\Presenters;

use App\Contracts\Client;
use App\Contracts\Presenters\Notification\Mailer\SendLearnerRegistrationEmailPresenter;
use App\Contracts\Presenters\Personal\Auth\CreateBaseAuthPresenter;
use App\Contracts\Presenters\Personal\Learner\RegisterLearnerPresenter;
use App\Contracts\Presenters\Personal\User\CreateUserPresenter;
use App\Contracts\Structures\AuthableStructure;
use App\Contracts\Structures\Personal\LearnerStructure;
use App\Contracts\Structures\Personal\UserStructure;
use Modules\Personal\Learner\Actions\CreateLearner;
use Modules\Personal\Learner\Dto\CreateLearnerDto;
use Modules\Personal\Learner\Repositories\LearnerRepository;

class RegisterLearner implements RegisterLearnerPresenter
{
    public function __construct(
        private CreateUserPresenter                   $newUser,
        private CreateBaseAuthPresenter               $newBaseAuth,
        private CreateLearner                         $createLearner,
        private LearnerRepository                     $learnerRepository,
        private SendLearnerRegistrationEmailPresenter $sendLearnerRegistrationEmail,
    ) {}

    public function __invoke(Client $client, array $attributes): LearnerStructure
    {
        $user = ($this->newUser)($attributes);
        $learner = $this->createLearner($user, $attributes);
        ($this->newBaseAuth)($learner, $attributes);
        ($this->sendLearnerRegistrationEmail)($learner);

        return $learner;
    }

    private function createLearner(UserStructure $user, array $attributes): LearnerStructure&AuthableStructure
    {
        $dto = CreateLearnerDto::new($user, $attributes);
        $learner = ($this->createLearner)($dto);
        $this->learnerRepository->add($learner->structure);

        return $learner->structure;
    }
}
