<?php

namespace App\Tests\Fakes\Presenters\Notification\Mailer;

use App\Contracts\Presenters\Notification\Mailer\SendLearnerRegistrationEmailPresenter;
use App\Contracts\Structures\LearnerStructure;

class SendLearnerRegistrationEmailFake implements SendLearnerRegistrationEmailPresenter
{
    public function __invoke(LearnerStructure $learner): void
    {
        // TODO: Implement __invoke() method.
    }
}
