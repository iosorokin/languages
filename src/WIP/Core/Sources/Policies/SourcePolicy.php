<?php

declare(strict_types=1);

namespace WIP\Core\Sources\Policies;

use Domain\Core\Languages\Model\Manager\Aggregates\Student\Policies\CanTakeToLearn;
use WIP\Core\Sources\Structures\Source;

final class SourcePolicy
{
    public function __construct(
        private CanTakeToLearn $languagePolicy,
    ) {}

    public function canTakeToWork(Source $source): void
    {
        $language = $source->language;
        $this->languagePolicy->__invoke($language);
    }
}
