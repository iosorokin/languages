<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Policies;

use App\Contracts\Contexts\Client;
use Modules\Languages\Entity\Language;

final class LaravelRulePolicy implements RulePolicy
{
    public function canCreate(Client $client, Language $language): void
    {

    }
}
