<?php

namespace Modules\Education\Rules\Policies;

use App\Contracts\Contexts\Client;
use Modules\Languages\Entity\Language;

interface RulePolicy
{
    public function canCreate(Client $client, Language $language): void;
}
