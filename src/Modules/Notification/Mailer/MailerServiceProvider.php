<?php

namespace Modules\Notification\Mailer;


use Illuminate\Support\ServiceProvider;
use Modules\Notification\Mailer\Presenters\SendRegistrationEmail;
use Modules\Notification\Mailer\Presenters\SendRegistrationEmailFake;
use Modules\Notification\Mailer\Presenters\SendRegistrationEmailPresenter;

class MailerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->environment(['test', 'testing'])) {
            $this->app->bind(
                SendRegistrationEmailPresenter::class,
                SendRegistrationEmailFake::class
            );
        } else {
            $this->app->bind(
                SendRegistrationEmailPresenter::class,
                SendRegistrationEmail::class
            );
        }
    }
}
