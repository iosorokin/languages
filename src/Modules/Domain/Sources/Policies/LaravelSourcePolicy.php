<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Policies;

use Modules\Domain\Languages\Entities\Language;
use Modules\Domain\Sources\Entities\Source;
use Modules\Personal\Auth\Contexts\Client;

final class LaravelSourcePolicy implements SourcePolicy
{
    public function canCreate(Client $client, Language $language): void
    {
        if (! $client->isMember()) {
            abort(403);
        }
    }

    public function canShow(Client $client, Source $source): void
    {

    }
}
