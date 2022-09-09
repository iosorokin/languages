<?php

namespace App\Contracts\Presenters\Notification\Mailer;

use App\Contracts\Structures\Personal\LearnerStructure;

interface SendLearnerRegistrationEmailPresenter
{
    public function __invoke(LearnerStructure $learner): void;
}
