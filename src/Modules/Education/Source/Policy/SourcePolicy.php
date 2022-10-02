<?php

namespace Modules\Education\Source\Policy;

use App\Contracts\Contexts\Client;
use Modules\Languages\Entity\Language;

interface SourcePolicy
{
    public function canCreate(Client $client, Language $language): void;
}
