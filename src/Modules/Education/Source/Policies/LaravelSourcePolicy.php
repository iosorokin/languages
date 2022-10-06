<?php

declare(strict_types=1);

namespace Modules\Education\Source\Policies;

use Modules\Education\Source\Entities\Source;
use Modules\Languages\Entities\Language;
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
