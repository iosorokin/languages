<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Policies;

use Modules\Domain\Languages\Entities\Language;
use Modules\Personal\Auth\Contexts\Client;

final class LaravelLanguagePolicy implements LanguagePolicy
{
    public function canCreate(Client $client): void
    {
        if (! $client->isAdmin()) {
            abort(403);
        }
    }

    public function canShow(Client $client, Language $language): void
    {
        //
    }

    public function canUpdate(Client $client, Language $language): void
    {
        if (! $client->isAdmin()) {
            abort(403);
        }
    }

    public function canDelete(Client $client, Language $language): void
    {
        if (! $client->isAdmin()) {
            abort(403);
        }
    }
}
