<?php

namespace Modules\Notification\Mailer\Presenters;

use Modules\Personal\User\Entities\User;

interface SendRegistrationEmailPresenter
{
    public function __invoke(User $user): void;
}
