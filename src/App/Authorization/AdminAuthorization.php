<?php

declare(strict_types=1);

namespace App\Authorization;

use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

final class AdminAuthorization
{
    public function authorize(EloquentUserModel $user): void
    {
        if (! $user->roles->isAdmin()) {
            abort(403);
        }
    }
}
