<?php

declare(strict_types=1);

namespace Modules\Personal\Learner\Actions;

use App\Contracts\Structures\Personal\LearnerStructure;
use App\Contracts\Structures\Personal\UserStructure;
use Modules\Personal\Learner\Factories\LearnerFactory;
use Modules\Personal\Learner\Structures\LearnerModel;
use Modules\Personal\Learner\Validators\CreateLearnerValidator;

final class CreateLearner
{
    public function __construct(
        private CreateLearnerValidator $validator,
        private LearnerFactory $factory,
    ) {}

    public function __invoke(UserStructure $user, array $attributes): LearnerModel
    {
        $attributes = $this->validator->validate($attributes);
        $learner = $this->factory->new($user, $attributes);

        return $learner;
    }
}
