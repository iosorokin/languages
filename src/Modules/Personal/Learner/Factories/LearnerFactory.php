<?php

namespace Modules\Personal\Learner\Factories;

use Modules\Personal\Learner\Structures\LearnerModel;
use Modules\Personal\User\Structures\UserModel;

class LearnerFactory
{
    public function new(array $attributes): LearnerModel
    {
        $learner = new LearnerModel();

        return $learner;
    }
}
