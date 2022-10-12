<?php

namespace Modules\Notification\Mailer\Presenters;

use Modules\Personal\User\Structures\User;

interface SendRegistrationEmailPresenter
{
    public function __invoke(User $user): void;
}
