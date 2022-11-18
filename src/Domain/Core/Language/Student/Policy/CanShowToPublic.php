<?php

declare(strict_types=1);

namespace Domain\Core\Language\Student\Policy;

use App\Exceptions\PolicyException;
use Domain\Core\Language\Guest\Model\Aggregate\GuestLanguage;
use Domain\Core\Language\Student\Model\Aggregates\StudentLanguageImp;

final class CanShowToPublic
{
    public function __invoke(StudentLanguageImp|GuestLanguage $language)
    {
        if (! $language->isActive()) {
            throw new PolicyException();
        }
    }
}
