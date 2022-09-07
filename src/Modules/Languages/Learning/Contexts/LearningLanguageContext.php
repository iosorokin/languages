<?php

namespace Modules\Languages\Learning\Contexts;

use App\Contracts\Learnable;
use App\Contracts\Structures\Languages\LearningLanguageStructure;
use App\Contracts\Structures\Personal\LearnerStructure;

class LearningLanguageContext
{
    public function __construct(
        public readonly LearningLanguageStructure $structure
    ) {}

    public function setLearner(LearnerStructure $learner): self
    {
        $this->structure->setLearner($learner);

        return $this;
    }

    public function setLanguage(Learnable $language): self
    {
        $this->structure->setLanguage($language);

        return $this;
    }

    public function setTitle(mixed $title): self
    {
        $this->structure->title = $title;

        return $this;
    }
}
