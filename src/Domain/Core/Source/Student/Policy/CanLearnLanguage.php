<?php

declare(strict_types=1);

namespace Domain\Core\Source\Student\Policy;

use App\Exceptions\DomainException;
use Domain\Core\Source\Student\Model\Entity\StudentSourceLanguage;

final class CanLearnLanguage
{
    public function __invoke(StudentSourceLanguage $language)
    {
        if (! $language->isActive()) {
            throw new DomainException(sprintf(
                'Language %d not active',
                $language->id()->toInt(),
            ));
        }
    }
}
