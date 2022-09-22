<?php

namespace Modules\Languages\Learning\Actions;

use App\Contracts\Structures\LearnableStructure;
use App\Contracts\Structures\LearnerStructure;
use App\Contracts\Structures\LearningLanguageStructure;
use Modules\Languages\Learning\Factories\LearningFactory;
use Modules\Languages\Learning\Repositories\LearningLanguageRepository;

class LearnLanguage
{
    public function __construct(
        private LearningFactory $factory,
        private LearningLanguageRepository $repository,
    ) {}

    public function __invoke(
        LearnerStructure $learner,
        LearnableStructure $language,
        array $attributes
    ): LearningLanguageStructure
    {
        $learning = $this->factory->new($learner, $language, $attributes);
        $this->repository->add($learning);

        return $learning;
    }
}
