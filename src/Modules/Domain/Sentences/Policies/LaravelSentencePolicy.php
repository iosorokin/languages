<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Policies;

use Modules\Internal\Container\Entites\Container;
use Modules\Personal\Auth\Contexts\Client;

final class LaravelSentencePolicy implements SentencePolicy
{
    public function canCreate(Client $client, Container $container): void
    {

    }
}
