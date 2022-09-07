<?php

namespace App\Presenters\Personal\Learner;

use App\Contracts\AuthableStructure;
use App\Contracts\Client;
use App\Presenters\Personal\Auth\Base\NewBaseAuth;
use App\Presenters\Personal\Registration;
use App\Presenters\Personal\User\NewUser;
use App\Repositories\Personal\Learner\LearnerRepository;
use App\Structures\Personal\LearnerStructure;
use App\Structures\Personal\UserStructure;
use Modules\Notification\Mailer\Actions\SendLearnerRegistrationEmail;
use Modules\Personal\Learner\Actions\CreateLearner;
use Modules\Personal\Learner\Dto\CreateLearnerDto;

class RegisterLearner
{
    public function __construct(
        private NewUser $newUser,
        private NewBaseAuth $newBaseAuth,
        private CreateLearner $createLearner,
        private LearnerRepository $learnerRepository,
        private SendLearnerRegistrationEmail $sendLearnerRegistrationEmail,
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
