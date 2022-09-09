<?php

namespace Modules\Personal\Learner\Contexts;

use App\Contracts\Structures\Personal\BaseAuthStructure;
use App\Contracts\Structures\Personal\LearnerStructure;
use App\Contracts\Structures\Personal\UserStructure;

class RelationBinder
{
    public function relateLearnerWithUser(LearnerStructure $learner, UserStructure $user): void
    {
        $learner->setUser($user);
    }

    public function relateBaseAuthWithLearner(BaseAuthStructure $baseAuth, LearnerStructure $learner): void
    {
        $baseAuth->setAuthable($learner);
    }
}
