<?php

namespace App\Repositories\Lanugages;

use App\Extensions\Assert;
use App\Structures\Languages\LearningLanguageStructure;
use Modules\Education\Learning\Structures\LearningLanguageModel;

class EloquentLearningLanguageRepository implements LearningLanguageRepository
{
    public function add(LearningLanguageStructure $learning): void
    {
        Assert::isInstanceOf($learning, LearningLanguageModel::class);
        /** @var LearningLanguageModel $learning */
        $learning->save();
    }
}
