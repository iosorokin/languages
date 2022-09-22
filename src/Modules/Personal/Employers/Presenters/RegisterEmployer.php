<?php

declare(strict_types=1);

namespace Modules\Personal\Employers\Presenters;

use App\Contracts\Contexts\Client;
use Modules\Personal\Auth\Presenters\Base\CreateBaseAuthPresenter;
use Modules\Personal\Employers\Actions\CreateEmployer;
use Modules\Personal\Employers\Actions\SaveCreatedEmployer;
use Modules\Personal\Employers\Structures\EmployerModel;
use Modules\Personal\User\Presenters\CreateUserPresenter;

final class RegisterEmployer implements RegisterEmployerPresenter
{
    public function __construct(
        private CreateUserPresenter     $newUser,
        private CreateBaseAuthPresenter $newBaseAuth,
        private CreateEmployer          $createEmployer,
        private SaveCreatedEmployer     $saveCreatedEmployer,
    ) {}

    public function __invoke(Client $client, array $attributes): EmployerModel
    {
        $user = ($this->newUser)($attributes);
        $employer = ($this->createEmployer)($attributes);
        $baseAuth = ($this->newBaseAuth)($attributes);
        ($this->saveCreatedEmployer)($user, $employer, $baseAuth);

        return $employer;
    }
}
