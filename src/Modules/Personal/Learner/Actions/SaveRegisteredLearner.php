<?php

declare(strict_types=1);

namespace Modules\Personal\Learner\Actions;

use App\Contracts\Presenters\Personal\Auth\SaveBaseAuthPresenter;
use App\Contracts\Presenters\Personal\Learner\SaveLearnerPresenter;
use App\Contracts\Presenters\Personal\User\SaveUserPresenter;
use App\Contracts\Structures\Personal\BaseAuthStructure;
use App\Contracts\Structures\Personal\LearnerStructure;
use App\Contracts\Structures\Personal\UserStructure;
use Illuminate\Support\Facades\DB;
use Modules\Personal\Learner\Contexts\RelationBinder;

final class SaveRegisteredLearner
{
    public function __construct(
        private SaveUserPresenter     $saveUser,
        private SaveLearnerPresenter  $saveLearner,
        private SaveBaseAuthPresenter $saveBaseAuth,
        private RelationBinder        $relationBinder,
    ) {}

    public function __invoke(UserStructure $user, LearnerStructure $learner, BaseAuthStructure $baseAuth): void
    {
        DB::transaction(function () use ($user, $learner, $baseAuth) {
            ($this->saveUser)($user);
            $this->relationBinder->relateLearnerWithUser($learner, $user);
            ($this->saveLearner)($learner);
            $this->relationBinder->relateBaseAuthWithLearner($baseAuth, $learner);
            ($this->saveBaseAuth)($baseAuth);
        });
    }
}
