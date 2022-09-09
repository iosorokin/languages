<?php

namespace App\Contracts\Presenters\Personal\Learner;

use App\Contracts\Structures\Personal\LearnerStructure;
use App\Contracts\Structures\Personal\UserStructure;

interface CreateLearnerPresenter
{
    public function __invoke(UserStructure $user, array $attributes): LearnerStructure;
}
