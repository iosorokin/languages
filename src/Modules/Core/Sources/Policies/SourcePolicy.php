<?php

namespace Modules\Core\Sources\Policies;

use Modules\Core\Languages\Entities\Language;
use Modules\Core\Sources\Entities\Source;
use Modules\Personal\Auth\Contexts\Client;

interface SourcePolicy
{
    public function canCreate(Client $client, Language $language): void;

    public function canShow(Client $client, Source $source): void;
}
