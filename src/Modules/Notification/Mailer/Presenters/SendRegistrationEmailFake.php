<?php

declare(strict_types=1);

namespace Modules\Notification\Mailer\Presenters;

use Modules\Personal\User\Entities\User;

final class SendRegistrationEmailFake implements SendRegistrationEmailPresenter
{
    public function __invoke(User $user): void
    {
        // TODO: Implement __invoke() method.
    }
}
