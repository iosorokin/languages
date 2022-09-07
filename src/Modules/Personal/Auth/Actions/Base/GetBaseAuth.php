<?php

namespace Modules\Personal\Auth\Actions\Base;

use App\Repositories\Personal\Auth\BaseAuthRepository;
use App\Structures\Personal\BaseAuthStructure;
use Exception;
use Modules\Personal\Auth\Dto\GetBaseAuthDto;

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
