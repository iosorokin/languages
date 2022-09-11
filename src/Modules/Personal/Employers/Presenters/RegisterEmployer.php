<?php

namespace Modules\Personal\Employers\Presenters;

use App\Contracts\Contexts\Client;
use App\Contracts\Presenters\Personal\Auth\CreateBaseAuthPresenter;
use App\Contracts\Presenters\Personal\Employers\RegisterEmployerPresenter;
use App\Contracts\Presenters\Personal\User\CreateUserPresenter;
use App\Contracts\Structures\AuthableStructure;
use App\Contracts\Structures\Personal\EmployerStructure;
use App\Contracts\Structures\Personal\UserStructure;
use Illuminate\Support\Arr;
use Modules\Personal\Employers\Actions\CreateEmployer;
use Modules\Personal\Employers\Dto\CreateEmployerDto;
use Modules\Personal\Employers\Enums\Position;
use Modules\Personal\Employers\Repositories\EmployerRepository;

class RegisterEmployer implements RegisterEmployerPresenter
{
    public function __construct(
        private CreateUserPresenter     $newUser,
        private CreateBaseAuthPresenter $newBaseAuth,
        private CreateEmployer          $createEmployer,
        private EmployerRepository      $repository,
    ) {}

    public function __invoke(Client $client, array $attributes): EmployerStructure
    {
        $user = ($this->newUser)($attributes);
        $employer = $this->createEmployer($user, $attributes);
        ($this->newBaseAuth)($employer, $attributes);

        return $employer;
    }

    private function createEmployer(UserStructure $user, array $attributes): EmployerStructure&AuthableStructure
    {
        $dto = new CreateEmployerDto(
            user: $user,
            position: Position::from(Arr::get($attributes, 'position'))
        );
        $employer = ($this->createEmployer)($dto);
        $this->repository->add($employer->structure);

        return $employer->structure;
    }
}
