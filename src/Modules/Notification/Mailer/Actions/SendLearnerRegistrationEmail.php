<?php

namespace Modules\Notification\Mailer\Actions;


use App\Structures\Personal\LearnerStructure;
use Illuminate\Bus\Dispatcher;
use Modules\Notification\Mailer\Tasks\SendLearnerRegistrationEmailTask;

class SendLearnerRegistrationEmail
{
    public function __construct(
        private Dispatcher $dispatcher
    ) {}

    public function __invoke(LearnerStructure $learner): void
    {
        $task = $this->makeTask($learner);
        $this->dispatcher->dispatch($task);
    }

    private function makeTask(LearnerStructure $learner): SendLearnerRegistrationEmailTask
    {
        return SendLearnerRegistrationEmailTask::new([
            'name' => $learner->getUser()->name
        ]);
    }
}
