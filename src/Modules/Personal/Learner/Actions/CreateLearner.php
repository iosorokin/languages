<?php

declare(strict_types=1);

namespace Modules\Personal\Learner\Actions;

use Modules\Personal\Learner\Factories\LearnerFactory;
use Modules\Personal\Learner\Structures\LearnerModel;
use Modules\Personal\Learner\Validators\CreateLearnerValidator;

final class CreateLearner
{
    public function __construct(
        private CreateLearnerValidator $validator,
        private LearnerFactory $factory,
    ) {}

    public function __invoke(array $attributes): LearnerModel
    {
        $attributes = $this->validator->validate($attributes);
        $learner = $this->factory->new($attributes);

        return $learner;
    }
}
