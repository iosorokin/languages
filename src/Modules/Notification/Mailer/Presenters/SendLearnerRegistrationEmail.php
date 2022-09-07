<?php

namespace Modules\Notification\Mailer\Presenters;


use App\Contracts\Presenters\Notification\Mailer\SendLearnerRegistrationEmailPresenter;
use App\Contracts\Structures\Personal\LearnerStructure;
use Illuminate\Bus\Dispatcher;
use Modules\Notification\Mailer\Tasks\SendLearnerRegistrationEmailTask;

class SendLearnerRegistrationEmail implements SendLearnerRegistrationEmailPresenter
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
