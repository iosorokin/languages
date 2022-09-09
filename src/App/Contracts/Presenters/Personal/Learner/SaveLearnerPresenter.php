<?php

namespace App\Contracts\Presenters\Personal\Learner;

use App\Contracts\Structures\Personal\LearnerStructure;

interface SaveLearnerPresenter
{
    public function __invoke(LearnerStructure $learner): void;
}
