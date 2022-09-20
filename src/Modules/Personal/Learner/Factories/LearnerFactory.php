<?php

namespace Modules\Personal\Learner\Factories;

use App\Contracts\Structures\Personal\LearnerStructure;
use App\Contracts\Structures\Personal\UserStructure;
use Modules\Personal\Learner\Contexts\Filling\FillNewLearner;
use Modules\Personal\Learner\Structures\LearnerModel;

class LearnerFactory
{
    public function new(UserStructure $user, array $attributes): LearnerModel
    {
        $filler = new FillNewLearner(new LearnerModel());

        return $filler->getStructure();
    }
}
