<?php

namespace Modules\Languages\Learning\Factories;

use App\Contracts\Structures\Languages\LanguageStructure;
use App\Contracts\Structures\Languages\LearnableStructure;
use App\Contracts\Structures\Languages\LearningLanguageStructure;
use App\Contracts\Structures\Personal\LearnerStructure;
use Illuminate\Support\Arr;
use Modules\Languages\Learning\Contexts\Fillers\LearningFiller;
use Modules\Languages\Learning\Structures\LearningLanguageModel;

class LearningFactory
{
    public function new(LearnerStructure $learner, LearnableStructure $language, array $attributes): LearningLanguageStructure
    {
        $learning = new LearningFiller(new LearningLanguageModel());
        $learning->setLearner($learner);
        $learning->setLanguage($language);
        $learning->setTitle(Arr::get($attributes, 'title'));

        return $learning;
    }
}
