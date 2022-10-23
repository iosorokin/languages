<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Authorization;

use Modules\Domain\Languages\Authorization\LanguageAuthorizeAdmin;
use Modules\Domain\Languages\Policies\LanguagePolicy;
use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\Auth\Contexts\Client;

final class SourceAuthorizeUserImpl implements SourceAuthorizeUser
{
    public function canCreate(Client $client, Language $language): void
    {
        abort_if(!$client->isMember(), 403);
    }

    public function canUpdate(Client $client, Source $source): void
    {
        $this->isNotOwner($client, $source);
    }

    public function canDelete(Client $client, Source $source): void
    {
        $this->isNotOwner($client, $source);
    }

    private function isNotOwner(Client $client, Source $source)
    {
        abort_if($client->id() !== $source->getUserId(), 403);
    }
}
