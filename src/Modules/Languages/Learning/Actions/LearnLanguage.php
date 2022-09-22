<?php

namespace Modules\Languages\Learning\Actions;

use Modules\Languages\LearnableStructure;
use Modules\Languages\Learning\Factories\LearningFactory;
use Modules\Languages\Learning\Repositories\LearningLanguageRepository;
use Modules\Languages\Learning\Structures\LearningLanguageStructure;
use Modules\Personal\Learner\Structures\LearnerStructure;

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
