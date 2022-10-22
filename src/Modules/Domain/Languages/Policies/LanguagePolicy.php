<?php

namespace Modules\Domain\Languages\Policies;

use Modules\Domain\Languages\Structures\Language;
use Modules\Personal\Auth\Contexts\Client;

interface LanguagePolicy
{
    public function canTakeToLearn(Client $client, Language $language): void;
}
