<?php

namespace Modules\Notification\Mailer\Presenters;

use Modules\Personal\Learner\Structures\LearnerStructure;

class SendLearnerRegistrationEmailFake implements SendLearnerRegistrationEmailPresenter
{
    public function __invoke(LearnerStructure $learner): void
    {
        // TODO: Implement __invoke() method.
    }
}
