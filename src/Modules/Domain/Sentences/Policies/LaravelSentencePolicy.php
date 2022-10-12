<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Policies;

use Modules\Domain\Sentences\Structures\Sentence;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\Auth\Contexts\Client;

final class LaravelSentencePolicy implements SentencePolicy
{
    public function canCreate(Client $client, Source $source): void
    {

    }

    public function canDelete(Client $client, Sentence $sentence): void
    {
        $source = $sentence->getSource();
        $userId = $source->getUserId();
        if (! $client->isAdmin() || $client->id() !== $userId) {
            abort(403);
        }
    }
}
