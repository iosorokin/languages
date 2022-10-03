<?php

namespace Modules\Container\Policies;

use App\Contracts\Contexts\Client;

interface ContainerPolicy
{
    public function canCreate(Client $client): void;
}
