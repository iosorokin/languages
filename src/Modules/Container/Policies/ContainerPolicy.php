<?php

namespace Modules\Container\Policies;

use Modules\Personal\Auth\Contexts\Client;

interface ContainerPolicy
{
    public function canCreate(Client $client): void;
}
