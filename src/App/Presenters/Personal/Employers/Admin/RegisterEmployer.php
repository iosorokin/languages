<?php

namespace App\Presenters\Personal\Employers\Admin;

use App\Contracts\AuthableStructure;
use App\Contracts\Client;
use App\Presenters\Personal\Auth\Base\NewBaseAuth;
use App\Presenters\Personal\User\NewUser;
use App\Repositories\Personal\Employer\EmployerRepository;
use App\Structures\Personal\EmployerStructure;
use App\Structures\Personal\UserStructure;
use Illuminate\Support\Arr;
use Modules\Personal\Employers\Actions\CreateEmployer;
use Modules\Personal\Employers\Dto\CreateEmployerDto;
use Modules\Personal\Employers\Enums\Position;

class RegisterEmployer
{
    public function __construct(
        private NewUser $newUser,
        private NewBaseAuth $newBaseAuth,
        private CreateEmployer $createEmployer,
        private EmployerRepository $repository,
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
        $position = Arr::get($attributes, 'position');
        $dto = new CreateEmployerDto(
            user: $user,
            position: call_user_func(Position::class, $position)
        );
        $employer = ($this->createEmployer)($dto);
        $this->repository->add($employer->structure);

        return $employer->structure;
    }
}
