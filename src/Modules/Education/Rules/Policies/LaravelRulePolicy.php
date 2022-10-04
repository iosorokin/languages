<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Policies;

use Modules\Languages\Entities\Language;
use Modules\Personal\Auth\Contexts\Client;

final class LaravelRulePolicy implements RulePolicy
{
    public function canCreate(Client $client, Language $language): void
    {

    }
}
