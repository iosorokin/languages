<?php

namespace App\Presenters\Personal\Auth\Base;

use App\Contracts\AuthableStructure;
use App\Repositories\Personal\Auth\BaseAuthRepository;
use App\Repositories\Personal\User\UserRepository;
use App\Structures\Personal\BaseAuthStructure;
use App\Structures\Personal\UserStructure;
use Modules\Personal\Auth\Actions\Base\CreateBaseAuth;
use Modules\Personal\Auth\Dto\CreateBaseAuthDto;
use Modules\Personal\User\Actions\CreateUser;

class NewBaseAuth
{
    public function __construct(
        private CreateBaseAuth $createBaseAuth,
        private BaseAuthRepository $baseAuthRepository,
    ) {}

    public function __invoke(AuthableStructure $authable, array $attributes): BaseAuthStructure
    {
        $dto = new CreateBaseAuthDto($authable, $attributes);
        // проверить на существование в базе
        $baseAuth = ($this->createBaseAuth)($dto);
        $this->baseAuthRepository->add($baseAuth);
        $authable->setBaseAuth($baseAuth);

        return $baseAuth;
    }
}
