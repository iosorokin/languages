<?php

namespace Modules\Languages\Learning\Repositories;

use App\Extensions\Assert;
use Modules\Languages\Learning\Structures\LearningLanguageModel;
use Modules\Languages\Learning\Structures\LearningLanguageStructure;

class EloquentLearningLanguageRepository implements LearningLanguageRepository
{
    public function add(LearningLanguageStructure $learning): void
    {
        Assert::isInstanceOf($learning, LearningLanguageModel::class);
        /** @var LearningLanguageModel $learning */
        $learning->save();
    }

    public function getById(int $id): LearningLanguageStructure
    {
        return LearningLanguageModel::find($id);
    }
}
