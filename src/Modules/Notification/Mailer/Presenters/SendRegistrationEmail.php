<?php

declare(strict_types=1);

namespace Modules\Notification\Mailer\Presenters;

use Illuminate\Bus\Dispatcher;
use Modules\Notification\Mailer\Tasks\SendLearnerRegistrationEmailTask;
use Modules\Personal\Domain\Entity\User;

final class SendRegistrationEmail
{
    public function __construct(
        private Dispatcher $dispatcher,
    ) {}

    public function __invoke(User $user): void
    {
        $task = new SendLearnerRegistrationEmailTask(
            $user->baseAuth()->email()->value(),
        );
        $this->dispatcher->dispatch($task);
    }
}
