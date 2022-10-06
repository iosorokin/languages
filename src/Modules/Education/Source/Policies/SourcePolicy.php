<?php

namespace Modules\Education\Source\Policies;

use Modules\Education\Source\Entities\Source;
use Modules\Languages\Entities\Language;
use Modules\Personal\Auth\Contexts\Client;

interface SourcePolicy
{
    public function canCreate(Client $client, Language $language): void;

    public function canShow(Client $client, Source $source): void;
}
