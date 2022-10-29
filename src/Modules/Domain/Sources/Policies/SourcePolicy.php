<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Policies;

use Modules\Domain\Languages\Domain\Policies\LanguagePolicy;
use Modules\Domain\Sources\Structures\Source;

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
