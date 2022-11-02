<?php

namespace Domain\Notification\Mailer;


use Illuminate\Support\Facades\Bus;
use Illuminate\Support\ServiceProvider;
use Domain\Notification\Mailer\Application\Tasks\SendLearnerRegistrationEmailTask;

class MailerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->environment(['test', 'testing'])) {
            Bus::fake(SendLearnerRegistrationEmailTask::class);
        }
    }
}
