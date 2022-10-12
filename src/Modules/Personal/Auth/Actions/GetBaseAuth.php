<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Actions;

use Exception;
use Illuminate\Support\Facades\Hash;
use Modules\Personal\Auth\Dto\GetBaseAuthDto;
use Modules\Personal\Auth\Structures\BaseAuth;
use Modules\Personal\Auth\Repositories\BaseAuthRepository;

class GetBaseAuth
{
    public function __construct(
        private BaseAuthRepository $repository,
    ) {}

    public function __invoke(GetBaseAuthDto $dto): BaseAuth
    {
        $baseAuth = $this->repository->getByEmail($dto->email);

        if (! $baseAuth) {
            $this->throwValidationException();
        }

        if (! Hash::check($dto->password, $baseAuth->getPassword())) {
            $this->throwValidationException();
        }

        return $baseAuth;
    }

    private function throwValidationException(): void
    {
        // fixme временное решение для имитации валидации
        throw new Exception('Пароль и мэил не совпали');
    }
}
