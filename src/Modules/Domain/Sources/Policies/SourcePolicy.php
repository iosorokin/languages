<?php

namespace Modules\Domain\Sources\Policies;

use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\Auth\Contexts\Client;

interface SourcePolicy
{
    public function canCreate(Client $client, Language $language): void;

    public function canShow(Client $client, Source $source): void;

    public function canTakeToWork(Client $client, Source $source): void;
}
