<?php

namespace Modules\Languages\Learning\Structures;

use Modules\Languages\Common\Contracts\LanguageStructure;
use Modules\Languages\Common\Contracts\LearnableStructure;
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
