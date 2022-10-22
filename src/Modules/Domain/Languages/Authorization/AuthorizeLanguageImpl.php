<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Authorization;

use Illuminate\Validation\ValidationException;
use Modules\Domain\Languages\Structures\Language;
use Modules\Personal\Auth\Contexts\Client;

final class AuthorizeLanguageImpl implements AuthorizeLanguage
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

    public function canIndex(Client $client): void
    {
        // TODO: Implement userCanIndex() method.
    }

    public function adminCanIndex(Client $client, Language $language): void
    {
        if (! $client->isAdmin()) {
            abort(403);
        }
    }

    public function adminCanShow(Client $client, Language $language): void
    {
        if (! $client->isAdmin()) {
            abort(403);
        }
    }

    public function canUpdate(Client $client, Language $language): void
    {
        if (! $client->isAdmin()) {
            abort(403);
        }
    }

    public function canDelete(Client $client, Language $language): void
    {
        if (! $client->isRoot()) {
            abort(403);
        }
    }
}
