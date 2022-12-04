<?php

declare(strict_types=1);

namespace Core\Base\Policy\Language;

use Domain\Exceptions\DomainException;
use Domain\Education\Language\Base\Model\Aggregate\Language;

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
