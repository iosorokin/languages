<?php

namespace Modules\Notification\Mailer\Application\Tasks;

class SendLearnerRegistrationEmailTask
{
    public function __construct(
        public string $email,
    ) {}

    public function __invoke()
    {

    }
}
