<?php

declare(strict_types=1);

namespace Modules\Personal\Learner\Contexts\Filling;

use App\Contracts\Structures\Personal\LearnerStructure;
use App\Contracts\Structures\Personal\UserStructure;

abstract class FillLearner
{
    public function __construct(
        private LearnerStructure $structure
    ) {}

    public function setStructure(LearnerStructure $structure): static
    {
        $this->structure = $structure;

        return $this;
    }

    public function getStructure(): LearnerStructure
    {
        return $this->structure;
    }
}
