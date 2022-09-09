<?php

namespace App\Tests\Fakes\Presenters\Notification\Mailer;

use App\Contracts\Presenters\Notification\Mailer\SendLearnerRegistrationEmailPresenter;
use App\Contracts\Structures\Personal\LearnerStructure;

class SendLearnerRegistrationEmailFake implements SendLearnerRegistrationEmailPresenter
{
    public function __invoke(LearnerStructure $learner): void
    {
        // TODO: Implement __invoke() method.
    }
}
