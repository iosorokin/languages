<?php

namespace WIP\Notification\Mailer;


use Illuminate\Support\Facades\Bus;
use Illuminate\Support\ServiceProvider;
use WIP\Notification\Mailer\Application\Tasks\SendLearnerRegistrationEmailTask;

class MailerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->environment(['test', 'testing'])) {
            Bus::fake(SendLearnerRegistrationEmailTask::class);
        }
    }
}
