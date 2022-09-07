<?php

namespace Modules\Personal\Learner\Repositories;

use App\Contracts\Structures\Personal\LearnerStructure;

interface LearnerRepository
{
    public function add(LearnerStructure $learner): void;

    public function getById(int $id): LearnerStructure;
}
