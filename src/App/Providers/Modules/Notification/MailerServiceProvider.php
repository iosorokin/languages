<?php

namespace App\Providers\Modules\Notification;


use App\Contracts\Presenters\Notification\Mailer\SendLearnerRegistrationEmailPresenter;
use Illuminate\Support\ServiceProvider;
use Modules\Notification\Mailer\Presenters\SendLearnerRegistrationEmail;

class MailerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(SendLearnerRegistrationEmailPresenter::class, SendLearnerRegistrationEmail::class);
    }
}
