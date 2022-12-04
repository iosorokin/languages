<?php

declare(strict_types=1);

namespace Domain\Education\Language\Student\Policy;

use Domain\Exceptions\PolicyException;
use Domain\Education\Language\Guest\Model\Aggregate\GuestLanguage;
use Domain\Education\Language\Student\Model\Aggregates\StudentLanguageImp;

final class CanShowToPublic
{
    public function __invoke(StudentLanguageImp|GuestLanguage $language)
    {
        if (! $language->isActive()) {
            throw new PolicyException();
        }
    }
}
