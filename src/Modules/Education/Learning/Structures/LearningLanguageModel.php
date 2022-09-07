<?php

namespace Modules\Education\Learning\Structures;

use App\Contracts\Learnable;
use App\Structures\Languages\LearningLanguageStructure;
use App\Structures\Personal\LearnerStructure;
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
