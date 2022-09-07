<?php

namespace Modules\Education\Learning\Dto;

use App\Contracts\Learnable;
use App\Structures\Languages\RealLanguageStructure;
use App\Structures\Personal\LearnerStructure;

class CreateLearningDto
{
    public function __construct(
        public readonly LearnerStructure $learner,
        public readonly Learnable $language,
        public readonly ?string $title,
    ){}
}
