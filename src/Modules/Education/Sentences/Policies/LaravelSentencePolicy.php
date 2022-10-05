<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Policies;

use Modules\Container\Entites\Container;
use Modules\Personal\Auth\Contexts\Client;

final class LaravelSentencePolicy implements SentencePolicy
{
    public function canCreate(Client $client, Container $container): void
    {
        // TODO: Implement canCreate() method.
    }
}
