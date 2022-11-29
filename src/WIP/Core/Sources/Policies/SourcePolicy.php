<?php

declare(strict_types=1);

namespace WIP\Core\Sources\Policies;

use App\Education\Languages\Model\Manager\Aggregates\Student\Policies\StudentCanTakeToLearn;
use WIP\Core\Sources\Structures\Source;

final class SourcePolicy
{
    public function __construct(
        private StudentCanTakeToLearn $languagePolicy,
    ) {}

    public function canTakeToWork(Source $source): void
    {
        $language = $source->language;
        $this->languagePolicy->__invoke($language);
    }
}
