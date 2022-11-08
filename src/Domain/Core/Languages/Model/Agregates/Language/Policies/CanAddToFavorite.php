<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Agregates\Language\Policies;

use App\Exceptions\InvalidArgumentException;
use Domain\Core\Languages\Model\Agregates\Language\Language;

final class CanAddToFavorite
{
    public function __invoke(Language $language)
    {
        if (! $language->isActive()) {
            throw new InvalidArgumentException(
                'language_id',
                sprintf('Language %s not active', $language->name())
            );
        }
    }
}
