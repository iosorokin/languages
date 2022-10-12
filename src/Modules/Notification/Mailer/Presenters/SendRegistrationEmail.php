<?php

declare(strict_types=1);

namespace Modules\Notification\Mailer\Presenters;

use Illuminate\Bus\Dispatcher;
use Modules\Notification\Mailer\Tasks\SendLearnerRegistrationEmailTask;
use Modules\Personal\User\Structures\User;

final class SendRegistrationEmail implements SendRegistrationEmailPresenter
{
    public function __construct(
        private Dispatcher $dispatcher
    ) {}

    public function __invoke(User $user): void
    {
        $task = $this->makeTask($user);
        $this->dispatcher->dispatch($task);
    }

    private function makeTask(User $user): SendLearnerRegistrationEmailTask
    {
        return SendLearnerRegistrationEmailTask::new([
            'name' => $user->getName()
        ]);
    }
}
