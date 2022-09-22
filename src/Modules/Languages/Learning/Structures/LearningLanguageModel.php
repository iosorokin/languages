<?php

namespace Modules\Languages\Learning\Structures;

use App\Extensions\Assert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Languages\Common\Contracts\LearnableStructure;
use Modules\Languages\Real\Structures\RealLanguageModel;
use Modules\Personal\Learner\Structures\LearnerModel;
use Modules\Personal\Learner\Structures\LearnerStructure;

class LearningLanguageModel extends Model implements LearningLanguageStructure
{
    protected $table = 'learning_languages';

    private function learner(): BelongsTo
    {
        return $this->belongsTo(LearnerModel::class);
    }

    private function language(): MorphTo
    {
        return $this->morphTo();
    }

    public function setLearner(LearnerStructure $learner): static
    {
        Assert::isInstanceOf($learner, LearnerModel::class);
        $this->learner()->associate($learner);

        return $this;
    }

    public function setLanguage(LearnableStructure $learningLanguage): static
    {
        Assert::isInstanceOfAny($learningLanguage, [RealLanguageModel::class]);
        $this->language()->associate($learningLanguage);

        return $this;
    }
}
