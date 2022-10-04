<?php

namespace Modules\Education\Rules\Policies;

use Modules\Languages\Entities\Language;
use Modules\Personal\Auth\Contexts\Client;

interface RulePolicy
{
    public function canCreate(Client $client, Language $language): void;
}
