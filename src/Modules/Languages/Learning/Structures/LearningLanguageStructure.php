<?php

namespace Modules\Languages\Learning\Structures;

use Modules\Languages\LanguageStructure;
use Modules\Languages\LearnableStructure;
use Modules\Personal\Learner\Structures\LearnerStructure;

/**
 * @property int $id
 * @property int $language_id
 * @property string $language_type
 * @property string $title
 */
interface LearningLanguageStructure extends LanguageStructure
{
    public function setLearner(LearnerStructure $learner): static;

    public function setLanguage(LearnableStructure $learningLanguage): static;
}
