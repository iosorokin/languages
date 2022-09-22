<?php

namespace App\Contracts\Presenters\Personal\Learner;

use App\Contracts\Structures\LearnerStructure;

interface RegisterLearnerPresenter
{
    public function __invoke(array $attributes): LearnerStructure;
}
