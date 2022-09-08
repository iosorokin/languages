<?php

namespace Modules\Languages\Learning\Factories;

use App\Contracts\Structures\Languages\LearningLanguageStructure;
use Modules\Languages\Learning\Contexts\LearningLanguageContext;
use Modules\Languages\Learning\Dto\CreateLearningDto;
use Modules\Languages\Learning\Repositories\LearningLanguageRepository;

class LearningFactory
{
    public function new(CreateLearningDto $dto): LearningLanguageContext
    {
        $learning = new LearningLanguageContext(app(LearningLanguageStructure::class));
        $learning->setLearner($dto->learner);
        $learning->setLanguage($dto->language);
        $learning->setTitle($dto->title);

        return $learning;
    }
}
