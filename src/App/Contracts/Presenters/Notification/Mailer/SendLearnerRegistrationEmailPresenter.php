<?php

namespace App\Contracts\Presenters\Notification\Mailer;

use Modules\Personal\Learner\Structures\LearnerModel;

interface SendLearnerRegistrationEmailPresenter
{
    public function __invoke(LearnerModel $learner): void;
}
