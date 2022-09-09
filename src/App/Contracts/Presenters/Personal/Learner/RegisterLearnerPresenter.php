<?php

namespace App\Contracts\Presenters\Personal\Learner;

use App\Contracts\Structures\Personal\LearnerStructure;

interface RegisterLearnerPresenter
{
    public function __invoke(array $attributes): LearnerStructure;
}
