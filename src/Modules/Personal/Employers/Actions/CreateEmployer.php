<?php

namespace Modules\Personal\Employers\Actions;

use App\Contracts\Presenters\Personal\User\CreateUserPresenter;
use Modules\Personal\Employers\Dto\CreateEmployerDto;

class CreateEmployer
{
    public function __construct(
        private CreateUserPresenter $createUser,
    ) {}

    public function __invoke(CreateEmployerDto $dto)
    {

    }
}
