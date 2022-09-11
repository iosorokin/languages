<?php

namespace App\Contracts\Presenters\Languages\Learning;

use App\Contracts\Structures\Languages\LearningLanguageStructure;
use App\Contracts\Structures\Personal\LearnerStructure;

interface LearnRealLanguagePresenter
{
    public function __invoke(LearnerStructure $learner, array $attributes): LearningLanguageStructure;
}
