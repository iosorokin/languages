<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Policies;

use Modules\Personal\Auth\Contexts\Client;

final class LaravelContainerPolicy implements ContainerPolicy
{
    public function canCreate(Client $client): void
    {

    }
}