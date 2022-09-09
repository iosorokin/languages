<?php

namespace App\Contracts\Structures\Languages;

use App\Contracts\Structures\Personal\LearnerStructure;

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
