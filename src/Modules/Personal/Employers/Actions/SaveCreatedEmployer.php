<?php

declare(strict_types=1);

namespace Modules\Personal\Employers\Actions;

use App\Contracts\Presenters\Personal\Auth\SaveBaseAuthPresenter;
use App\Contracts\Presenters\Personal\User\SaveUserPresenter;
use Illuminate\Support\Facades\DB;
use Modules\Personal\Auth\Structures\BaseAuthModel;
use Modules\Personal\Employers\Repositories\EmployerRepository;
use Modules\Personal\Employers\Structures\EmployerModel;
use Modules\Personal\User\Structures\UserModel;

final class SaveCreatedEmployer
{
    public function __construct(
        private SaveUserPresenter     $saveUser,
        private EmployerRepository     $repository,
        private SaveBaseAuthPresenter $saveBaseAuth,
    ) {}

    public function __invoke(UserModel $user, EmployerModel $employer, BaseAuthModel $baseAuth): void
    {
        DB::transaction(function () use ($user, $employer, $baseAuth) {
            ($this->saveUser)($user);
            $employer->setUser($user);
            $this->repository->add($employer);
            $baseAuth->setAuthable($employer);
            ($this->saveBaseAuth)($baseAuth);
        });
    }
}
