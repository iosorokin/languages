<?php

namespace Modules\Languages\Learning\Actions;

use App\Contracts\Structures\Languages\LearningLanguageStructure;
use Modules\Languages\Learning\Contexts\LearningLanguageContext;
use Modules\Languages\Learning\Dto\CreateLearningDto;
use Modules\Languages\Learning\Repositories\LearningLanguageRepository;

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
