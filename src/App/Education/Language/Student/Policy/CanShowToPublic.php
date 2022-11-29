<?php

declare(strict_types=1);

namespace App\Education\Language\Student\Policy;

use App\Exceptions\PolicyException;
use App\Education\Language\Guest\Model\Aggregate\GuestLanguage;
use App\Education\Language\Student\Model\Aggregates\StudentLanguageImp;

final class CanShowToPublic
{
    public function __invoke(StudentLanguageImp|GuestLanguage $language)
    {
        if (! $language->isActive()) {
            throw new PolicyException();
        }
    }
}
