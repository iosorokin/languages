<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Policies;

use Modules\Languages\Entities\Language;
use Modules\Personal\Auth\Contexts\Client;

interface DictionaryPolicy
{
    public function canCreate(Client $client, Language $language): void;
}
