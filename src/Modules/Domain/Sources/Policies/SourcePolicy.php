<?php

namespace Modules\Domain\Sources\Policies;

use Modules\Domain\Languages\Entities\Language;
use Modules\Domain\Sources\Entities\Source;
use Modules\Personal\Auth\Contexts\Client;

interface SourcePolicy
{
    public function canCreate(Client $client, Language $language): void;

    public function canShow(Client $client, Source $source): void;
}
