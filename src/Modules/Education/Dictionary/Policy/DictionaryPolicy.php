<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Policy;

use App\Contracts\Contexts\Client;
use Modules\Languages\Entity\Language;

interface DictionaryPolicy
{
    public function canCreate(Client $client, Language $language): void;
}
