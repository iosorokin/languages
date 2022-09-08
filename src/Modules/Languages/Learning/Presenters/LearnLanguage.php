<?php

namespace Modules\Languages\Learning\Presenters;

use Modules\Languages\Learning\Contexts\LearningLanguageContext;
use Modules\Languages\Learning\Factories\LearningFactory;
use Modules\Languages\Learning\Dto\CreateLearningDto;
use Modules\Languages\Learning\Repositories\LearningLanguageRepository;

class LearnLanguage
{
    public function __construct(
        private LearningFactory $factory,
        private LearningLanguageRepository $repository,
    ) {}

    public function __invoke(CreateLearningDto $dto): LearningLanguageContext
    {
        $learning = $this->factory->new($dto);
        $this->repository->add($learning->structure);

        return $learning;
    }
}
