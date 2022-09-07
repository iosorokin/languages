<?php

namespace Modules\Languages\Learning\Dto;

use App\Contracts\Learnable;
use App\Contracts\Structures\Personal\LearnerStructure;

class CreateLearningDto
{
    public function __construct(
        public readonly LearnerStructure $learner,
        public readonly Learnable $language,
        public readonly ?string $title,
    ){}
}
