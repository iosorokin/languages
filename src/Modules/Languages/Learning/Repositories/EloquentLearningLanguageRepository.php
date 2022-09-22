<?php

namespace Modules\Languages\Learning\Repositories;

use App\Contracts\Structures\LearningLanguageStructure;
use App\Extensions\Assert;
use Modules\Languages\Learning\Structures\LearningLanguageModel;

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
