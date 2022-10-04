<?php

declare(strict_types=1);

namespace Modules\Education\Source\Policies;

use Modules\Languages\Entities\Language;
use Modules\Personal\Auth\Contexts\Client;

final class LaravelSourcePolicy implements SourcePolicy
{
    public function canCreate(Client $client, Language $language): void
    {

    }
}
