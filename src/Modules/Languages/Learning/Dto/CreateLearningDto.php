<?php

namespace Modules\Languages\Learning\Dto;

use App\Contracts\Learnable;
use App\Contracts\Structures\Personal\LearnerStructure;
use Illuminate\Support\Arr;

class CreateLearningDto
{
    public function __construct(
        public readonly LearnerStructure $learner,
        public readonly Learnable $language,
        public readonly ?string $title,
    ){}

    public static function new(LearnerStructure $learner, Learnable $learnable, array $attributes): self
    {
        return new self(
            learner: $learner,
            language: $learnable,
            title: Arr::get($attributes, 'title')
        );
    }
}
