<?php

namespace Modules\Domain\Sources\Authorization;

use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\Auth\Contexts\Client;

interface SourceAuthorizeUser
{
    public function canCreate(Client $client, Language $language): void;

    public function canUpdate(Client $client, Source $source): void;

    public function canDelete(Client $client, Source $source): void;
}
