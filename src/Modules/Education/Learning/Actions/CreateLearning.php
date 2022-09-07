<?php

namespace Modules\Education\Learning\Actions;

use App\Repositories\Lanugages\LearningLanguageRepository;
use App\Structures\Languages\LearningLanguageStructure;
use Modules\Education\Learning\Contexts\LearningLanguageContext;
use Modules\Education\Learning\Dto\CreateLearningDto;

class CreateLearning
{
    public function __construct(
        private LearningLanguageRepository $repository,
    ) {}

    public function __invoke(CreateLearningDto $dto): LearningLanguageStructure
    {
        $learning = $this->createContext($dto);
        $this->repository->add($learning->structure);

        return $learning->structure;
    }

    private function createContext(CreateLearningDto $dto): LearningLanguageContext
    {
        $learning = new LearningLanguageContext(app(LearningLanguageStructure::class));
        $learning->setLearner($dto->learner);
        $learning->setLanguage($dto->language);
        $learning->setTitle($dto->title);

        return $learning;
    }
}
