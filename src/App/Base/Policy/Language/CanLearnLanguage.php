<?php

declare(strict_types=1);

namespace App\Base\Policy\Language;

use App\Exceptions\DomainException;
use Domain\Core\Language\Base\Model\Aggregate\Language;

final class CanLearnLanguage
{
    public function __invoke(Language $language)
    {
        if (! $language->status()->isActive()) {
            throw new DomainException(sprintf(
                'Language %s not active',
                $language->code(),
            ));
        }
    }
}
