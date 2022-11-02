<?php

declare(strict_types=1);

namespace Domain\Sources\Policies;

use Domain\Languages\Domain\Policies\LanguagePolicy;
use Domain\Sources\Structures\Source;

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
