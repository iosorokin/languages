<?php

namespace App\Repositories\Personal\Learner;

use App\Structures\Personal\LearnerStructure;
use Illuminate\Support\Facades\DB;
use Modules\Personal\Learner\Structures\LearnerModel;
use Modules\Personal\User\Structures\UserModel;
use Webmozart\Assert\Assert;

class EloquentLernerRepository implements LearnerRepository
{
    public function add(LearnerStructure $learner): void
    {
        Assert::isInstanceOf($learner, LearnerModel::class);
        /** @var LearnerModel $learner
         */
        $learner->save();
    }

    public function getById(int $id): LearnerStructure
    {
        /** @var LearnerModel $learner */
        $learner = LearnerModel::query()
            ->find($id);

        return $learner;
    }
}
