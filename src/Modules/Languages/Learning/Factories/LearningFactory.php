<?php

namespace Modules\Languages\Learning\Factories;

use Illuminate\Support\Arr;
use Modules\Languages\LearnableStructure;
use Modules\Languages\Learning\Contexts\Fillers\LearningFiller;
use Modules\Languages\Learning\Structures\LearningLanguageModel;
use Modules\Languages\Learning\Structures\LearningLanguageStructure;
use Modules\Personal\Learner\Structures\LearnerStructure;

class LearningFactory
{
    public function new(
        LearnerStructure $learner,
        LearnableStructure $language,
        array $attributes
    ): LearningLanguageStructure
    {
        $learning = new LearningFiller(new LearningLanguageModel());
        $learning->setLearner($learner);
        $learning->setLanguage($language);
        $learning->setTitle(Arr::get($attributes, 'title'));

        return $learning->getStructure();
    }
}
