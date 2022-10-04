<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Tests;

use Core\Base\Helpers\AppHelper;
use Modules\Personal\Auth\Contexts\Client;
use Modules\Personal\User\Entities\User;

final class AuthHelper extends AppHelper
{
    public function createClientContext(User $user): Client
    {
        return app()->make(Client::class, ['user' => $user]);
    }
}
