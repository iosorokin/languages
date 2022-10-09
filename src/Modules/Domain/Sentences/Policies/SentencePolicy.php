<?php

namespace Modules\Domain\Sentences\Policies;

use Modules\Internal\Container\Entites\Container;
use Modules\Personal\Auth\Contexts\Client;

interface SentencePolicy
{
    public function canCreate(Client $client, Container $container): void;
}
