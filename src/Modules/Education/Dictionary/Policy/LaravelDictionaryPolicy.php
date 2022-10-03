<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Policy;

use App\Contracts\Contexts\Client;
use Modules\Languages\Entity\Language;

final class LaravelDictionaryPolicy implements DictionaryPolicy
{
    public function canCreate(Client $client, Language $language): void
    {
        // TODO: Implement canCreate() method.
    }
}
