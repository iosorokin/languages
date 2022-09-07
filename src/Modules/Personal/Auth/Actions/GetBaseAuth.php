<?php

namespace Modules\Personal\Auth\Actions;

use App\Contracts\Structures\Personal\BaseAuthStructure;
use Exception;
use Modules\Personal\Auth\Dto\GetBaseAuthDto;
use Modules\Personal\Auth\Repositories\BaseAuthRepository;

class GetBaseAuth
{
    public function __construct(
        private BaseAuthRepository $repository,
    ) {}

    public function __invoke(GetBaseAuthDto $dto): BaseAuthStructure
    {
        $baseAuth = $this->repository->getByEmail($dto->email);

        if (! $baseAuth) {
            $this->throwValidationException();
        }

        if (! $baseAuth->isCorrectPassword($dto->password)) {
            $this->throwValidationException();
        }

        return $baseAuth->structure;
    }

    private function throwValidationException(): void
    {
        throw new Exception('Пароль и мэил не совпали');
    }
}
