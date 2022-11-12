<?php

declare(strict_types=1);

namespace WIP\Notification\Mailer\Application\Presenters;

use Illuminate\Bus\Dispatcher;
use WIP\Notification\Mailer\Application\Tasks\SendLearnerRegistrationEmailTask;
use WIP\Personal\Account\Model\Aggregates\Account;

final class SendRegistrationEmail
{
    public function __construct(
        private Dispatcher $dispatcher,
    ) {}

    public function __invoke(Account $user): void
    {
        $task = new SendLearnerRegistrationEmailTask(
            $user->baseAuth()->email()->get(),
        );
        $this->dispatcher->dispatch($task);
    }
}
