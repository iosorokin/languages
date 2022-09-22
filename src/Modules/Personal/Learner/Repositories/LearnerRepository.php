<?php

namespace Modules\Personal\Learner\Repositories;

use Modules\Personal\Learner\Structures\LearnerStructure;

interface LearnerRepository
{
    public function add(LearnerStructure $learner): void;

    public function getById(int $id): LearnerStructure;
}
