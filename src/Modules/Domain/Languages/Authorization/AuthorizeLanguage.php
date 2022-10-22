<?php

namespace Modules\Domain\Languages\Authorization;

use Modules\Domain\Languages\Structures\Language;
use Modules\Personal\Auth\Contexts\Client;

interface AuthorizeLanguage
{
    public function canCreate(Client $client): void;

    public function canShow(Client $client, Language $language): void;

    public function canIndex(Client $client): void;

    public function canUpdate(Client $client, Language $language): void;

    public function canDelete(Client $client, Language $language): void;
}
