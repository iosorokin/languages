<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Policies;

use Modules\Core\Languages\Domain\Policies\LanguagePolicy;
use Modules\Core\Sources\Structures\Source;

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
