<?php

namespace Modules\Languages\Learning\Structures;

use App\Contracts\Learnable;
use App\Contracts\Structures\Languages\LearningLanguageStructure;
use App\Contracts\Structures\Personal\LearnerStructure;
use Illuminate\Database\Eloquent\Model;

class LearningLanguageModel extends Model implements LearningLanguageStructure
{
    public function setLearner(LearnerStructure $learner): static
    {
        return $this;
    }

    public function setLanguage(Learnable $learningLanguage): static
    {
        return $this;
    }
}
