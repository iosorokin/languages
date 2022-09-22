<?php

namespace Modules\Languages\Learning\Contexts\Fillers;

use App\Contracts\Structures\LearnableStructure;
use App\Contracts\Structures\LearnerStructure;
use App\Contracts\Structures\LearningLanguageStructure;

class LearningFiller
{
    public function __construct(
        private LearningLanguageStructure $structure
    ) {}

    public function setStructure(LearningLanguageStructure $structure): static
    {
        $this->structure = $structure;

        return $this;
    }

    public function getStructure(): LearningLanguageStructure
    {
        return $this->structure;
    }

    public function setTitle(string $title): static
    {
        $this->structure->title = $title;

        return $this;
    }

    public function setLearner(LearnerStructure $learner): static
    {
        $this->structure->setLearner($learner);

        return $this;
    }

    public function setLanguage(LearnableStructure $language): static
    {
        $this->structure->setLanguage($language);

        return $this;
    }
}
