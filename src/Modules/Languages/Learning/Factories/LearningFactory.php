<?php

namespace Modules\Languages\Learning\Factories;

use App\Contracts\Structures\LearnableStructure;
use App\Contracts\Structures\LearnerStructure;
use App\Contracts\Structures\LearningLanguageStructure;
use Illuminate\Support\Arr;
use Modules\Languages\Learning\Contexts\Fillers\LearningFiller;
use Modules\Languages\Learning\Structures\LearningLanguageModel;

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
