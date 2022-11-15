<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Policy;

use App\Exceptions\PolicyException;
use Domain\Core\Language\Guest\Model\Aggregate\GuestLanguage as GuestLanguage;
use Domain\Core\Language\Student\Model\Aggregates\StudentLanguage as StudentLanguage;

final class CanShowToPublic
{
    public function __invoke(StudentLanguage|GuestLanguage $language)
    {
        if (! $language->isActive()) {
            throw new PolicyException();
        }
    }
}
