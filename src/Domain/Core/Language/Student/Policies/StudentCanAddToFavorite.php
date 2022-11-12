<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Manager\Aggregates\Student\Policies;

use App\Exceptions\InvalidArgumentException;
use Domain\Core\Languages\Model\Manager\Aggregates\Manager\ManagerLanguage;

final class StudentCanAddToFavorite
{
    public function __invoke(ManagerLanguage $language)
    {
        if (! $language->isActive()) {
            throw new InvalidArgumentException(
                'language_id',
                sprintf('Language %s not active', $language->name())
            );
        }
    }
}
