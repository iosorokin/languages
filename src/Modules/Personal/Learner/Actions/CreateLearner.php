<?php

namespace Modules\Personal\Learner\Actions;

use Modules\Personal\Learner\Contexts\Learner;
use Modules\Personal\Learner\Dto\CreateLearnerDto;
use Modules\Personal\Learner\Factories\LearnerFactory;

class CreateLearner
{
    public function __construct(
        private LearnerFactory $factory,
    ) {}

    public function __invoke(CreateLearnerDto $dto): Learner
    {
        $learner = $this->factory->new($dto);

        return $learner;
    }
}
