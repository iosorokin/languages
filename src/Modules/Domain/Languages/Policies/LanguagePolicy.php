<?php

namespace Modules\Domain\Languages\Policies;

use Modules\Domain\Languages\Structures\Language;
use Modules\Personal\Auth\Contexts\Client;

interface LanguagePolicy
{
    public function canCreate(Client $client): void;

    public function canShow(Client $client, Language $language): void;

    public function canUpdate(Client $client, Language $language): void;

    public function canDelete(Client $client, Language $language): void;

    public function canTakeToLearn(Client $client, Language $language): void;
}
