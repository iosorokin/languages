<?php

namespace Modules\Education\Sentences\Policies;

use Modules\Container\Entites\Container;
use Modules\Personal\Auth\Contexts\Client;

interface SentencePolicy
{
    public function canCreate(Client $client, Container $container): void;
}
