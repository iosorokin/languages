<?php

namespace Modules\Notification\Mailer;


use Illuminate\Support\Facades\Bus;
use Illuminate\Support\ServiceProvider;
use Modules\Notification\Mailer\Tasks\SendLearnerRegistrationEmailTask;

class MailerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->environment(['test', 'testing'])) {
            Bus::fake(SendLearnerRegistrationEmailTask::class);
        }
    }
}
