<?php

declare(strict_types=1);

namespace Domain\Notification\Mailer\Application\Presenters;

use Domain\Notification\Mailer\Application\Tasks\SendLearnerRegistrationEmailTask;
use Domain\Personal\Entities\User;
use Illuminate\Bus\Dispatcher;

final class SendRegistrationEmail
{
    public function __construct(
        private Dispatcher $dispatcher,
    ) {}

    public function __invoke(User $user): void
    {
        $task = new SendLearnerRegistrationEmailTask(
            $user->baseAuth()->email()->get(),
        );
        $this->dispatcher->dispatch($task);
    }
}
