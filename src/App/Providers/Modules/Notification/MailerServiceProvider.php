<?php

namespace App\Providers\Modules\Notification;


use App\Contracts\Presenters\Notification\Mailer\SendLearnerRegistrationEmailPresenter;
use App\Tests\Fakes\Presenters\Notification\Mailer\SendLearnerRegistrationEmailFake;
use Illuminate\Support\ServiceProvider;
use Modules\Notification\Mailer\Presenters\SendLearnerRegistrationEmail;

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
