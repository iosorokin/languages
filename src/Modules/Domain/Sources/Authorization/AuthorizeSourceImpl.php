<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Authorization;

use Modules\Domain\Languages\Authorization\LanguageAuthorizeAdmin;
use Modules\Domain\Languages\Policies\LanguagePolicy;
use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\Auth\Contexts\Client;

final class AuthorizeSourceImpl implements AuthorizeSource
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

    public function canTakeToWork(Client $client, Source $source): void
    {
        $isClientOwner = $client->id() === $source->getUserId();
        if ($isClientOwner) return;
        $owner = $source->getUser();
        $permission = $owner->getPermission();
        abort_if($permission->isAdmin(), 403);
    }
}
