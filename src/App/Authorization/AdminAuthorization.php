<?php

declare(strict_types=1);

namespace App\Authorization;

use Modules\Personal\User\Model\User;

final class AdminAuthorization
{
    public function authorize(User $user): void
    {
        if (! $user->roles->isAdmin()) {
            abort(403);
        }
    }
}
