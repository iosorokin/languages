<?php

namespace Modules\Notification\Mailer\Presenters;

use Modules\Personal\Learner\Structures\LearnerModel;

interface SendLearnerRegistrationEmailPresenter
{
    public function __invoke(LearnerModel $learner): void;
}
