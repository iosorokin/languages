<?php

namespace Modules\Notification\Mailer\Presenters;


use App\Contracts\Presenters\Notification\Mailer\SendLearnerRegistrationEmailPresenter;
use Illuminate\Bus\Dispatcher;
use Modules\Notification\Mailer\Tasks\SendLearnerRegistrationEmailTask;
use Modules\Personal\Learner\Structures\LearnerModel;

class SendLearnerRegistrationEmail implements SendLearnerRegistrationEmailPresenter
{
    public function __construct(
        private Dispatcher $dispatcher
    ) {}

    public function __invoke(LearnerModel $learner): void
    {
        $task = $this->makeTask($learner);
        $this->dispatcher->dispatch($task);
    }

    private function makeTask(LearnerModel $learner): SendLearnerRegistrationEmailTask
    {
        return SendLearnerRegistrationEmailTask::new([
            'name' => $learner->getUser()->name
        ]);
    }
}
