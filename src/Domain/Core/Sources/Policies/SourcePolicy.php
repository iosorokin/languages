<?php

declare(strict_types=1);

namespace Domain\Core\Sources\Policies;

use Domain\Core\Languages\Domain\Policies\LanguagePolicy;
use Domain\Core\Sources\Structures\Source;

final class SourcePolicy
{
    public function __construct(
        private LanguagePolicy $languagePolicy,
    ) {}

    public function canTakeToWork(Source $source): void
    {
        $language = $source->language;
        $this->languagePolicy->canTakeToLearn($language);
    }
}
