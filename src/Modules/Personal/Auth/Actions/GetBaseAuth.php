<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Actions;

use Exception;
use Modules\Personal\Auth\Dto\GetBaseAuthDto;
use Modules\Personal\Auth\Repositories\BaseAuthRepository;
use Modules\Personal\Auth\Structures\BaseAuthStructure;

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
        // fixme временное решение для имитации валидации
        throw new Exception('Пароль и мэил не совпали');
    }
}
