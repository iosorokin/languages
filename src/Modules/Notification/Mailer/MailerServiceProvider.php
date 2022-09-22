<?php

namespace Modules\Notification\Mailer;


use Illuminate\Support\ServiceProvider;
use Modules\Notification\Mailer\Presenters\SendLearnerRegistrationEmail;
use Modules\Notification\Mailer\Presenters\SendLearnerRegistrationEmailFake;
use Modules\Notification\Mailer\Presenters\SendLearnerRegistrationEmailPresenter;

class MailerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->environment(['test', 'testing'])) {
            $this->app->bind(
                SendLearnerRegistrationEmailPresenter::class,
                SendLearnerRegistrationEmailFake::class
            );
        } else {
            $this->app->bind(
                SendLearnerRegistrationEmailPresenter::class,
                SendLearnerRegistrationEmail::class
            );
        }
    }
}
