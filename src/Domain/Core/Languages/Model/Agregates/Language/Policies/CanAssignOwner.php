<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Agregates\Language\Policies;

use Domain\Core\Languages\Authorization\LanguageAuthorization;
use Domain\Core\Languages\Model\Entities\LanguageOwner;

final class CanAssignOwner
{
    public function __construct(
        private LanguageAuthorization $languageAuthorization,
    ) {}

    public function __invoke(LanguageOwner $owner): void
    {
        $this->languageAuthorization->checkRoot($owner->id());
    }
}
