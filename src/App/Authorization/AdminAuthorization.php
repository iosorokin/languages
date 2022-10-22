<?php

declare(strict_types=1);

namespace App\Authorization;

use Modules\Personal\Auth\Contexts\Client;

final class AdminAuthorization
{
    public function authorize(Client $client): void
    {
        if (! $client->isAdmin()) {
            abort(403);
        }
    }
}
