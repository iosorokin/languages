<?php

namespace Modules\Internal\Container\Policies;

use Modules\Personal\Auth\Contexts\Client;

interface ContainerPolicy
{
    public function canCreate(Client $client): void;
}
