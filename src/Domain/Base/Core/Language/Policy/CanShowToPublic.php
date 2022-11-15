<?php

declare(strict_types=1);

namespace Domain\Base\Core\Language\Policy;

use App\Exceptions\PolicyException;
use Domain\Guest\Core\Language\Model\Aggregate\GuestLanguage;
use Domain\Student\Core\Language\Model\Aggregates\StudentLanguage;

final class CanShowToPublic
{
    public function __invoke(StudentLanguage|GuestLanguage $language)
    {
        if (! $language->isActive()) {
            throw new PolicyException();
        }
    }
}
