<?php

declare(strict_types=1);

namespace App\Authorization;

use Modules\Personal\Infrastructure\Repository\EloquentUserModel;

final class AdminAuthorization
{
    public function authorize(EloquentUserModel $user): void
    {
        if (! $user->roles->isAdmin()) {
            abort(403);
        }
    }
}
