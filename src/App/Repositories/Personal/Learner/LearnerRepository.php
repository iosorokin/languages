<?php

namespace App\Repositories\Personal\Learner;

use App\Structures\Personal\LearnerStructure;
use Modules\Personal\Learner\Contexts\Learner;

interface LearnerRepository
{
    public function add(LearnerStructure $learner): void;

    public function getById(int $id): LearnerStructure;
}
