<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Authorization;

use Illuminate\Validation\ValidationException;
use Modules\Domain\Languages\Structures\Language;
use Modules\Personal\Auth\Contexts\Client;

final class LanguageAuthorizeAdminImpl implements LanguageAuthorizeAdmin
{
    public function canCreate(Client $client): void
    {
        $this->abortIfNotRoot($client);
    }

    public function canShow(Client $client, Language $language): void
    {
        $this->abortIfNotAdmin($client);
    }

    public function canIndex(Client $client): void
    {
        $this->abortIfNotAdmin($client);
    }

    public function canUpdate(Client $client, Language $language): void
    {
        $this->abortIfNotRoot($client);
    }

    public function canDelete(Client $client, Language $language): void
    {
        $this->abortIfNotRoot($client);
    }

    private function abortIfNotAdmin(Client $client): void
    {
        if (! $client->isAdmin()) {
            abort(403);
        }
    }

    private function abortIfNotRoot(Client $client): void
    {
        if (! $client->isRoot()) {
            abort(403);
        }
    }
}
