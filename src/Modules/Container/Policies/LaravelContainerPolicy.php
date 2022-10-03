<?php

declare(strict_types=1);

namespace Modules\Container\Policies;

use App\Contracts\Contexts\Client;

final class LaravelContainerPolicy implements ContainerPolicy
{
    public function canCreate(Client $client): void
    {

    }
}
