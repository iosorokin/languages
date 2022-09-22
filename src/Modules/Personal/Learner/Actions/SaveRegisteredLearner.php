<?php

declare(strict_types=1);

namespace Modules\Personal\Learner\Actions;

use App\Contracts\Presenters\Personal\Auth\SaveBaseAuthPresenter;
use App\Contracts\Presenters\Personal\User\SaveUserPresenter;
use Illuminate\Support\Facades\DB;
use Modules\Personal\Auth\Structures\BaseAuthModel;
use Modules\Personal\Learner\Structures\LearnerModel;
use Modules\Personal\User\Structures\UserModel;

final class SaveRegisteredLearner
{
    public function __construct(
        private SaveUserPresenter     $saveUser,
        private SaveLearner           $saveLearner,
        private SaveBaseAuthPresenter $saveBaseAuth,
    ) {}

    public function __invoke(UserModel $user, LearnerModel $learner, BaseAuthModel $baseAuth): void
    {
        DB::transaction(function () use ($user, $learner, $baseAuth) {
            ($this->saveUser)($user);
            $learner->setUser($user);
            ($this->saveLearner)($learner);
            $baseAuth->setAuthable($learner);
            ($this->saveBaseAuth)($baseAuth);
        });
    }
}
