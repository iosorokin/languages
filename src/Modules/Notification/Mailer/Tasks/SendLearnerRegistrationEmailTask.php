<?php

namespace Modules\Notification\Mailer\Tasks;

use Modules\Personal\User\Model\User;

class SendLearnerRegistrationEmailTask
{
    public function __construct(
        public readonly User $user,
    ) {}

    public function __invoke()
    {

    }
}
