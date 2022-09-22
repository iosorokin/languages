<?php

namespace Modules\Personal\Learner\Presenters;

use Modules\Personal\Learner\Structures\LearnerStructure;

interface RegisterLearnerPresenter
{
    public function __invoke(array $attributes): LearnerStructure;
}
