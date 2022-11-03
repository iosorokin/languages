<?php

declare(strict_types=1);

namespace Domain\Personal\Actions\Auth;

use App\Values\Contacts\Email\UserEmail;
use Domain\Personal\Dto\BaseLoginDto;
use Domain\Personal\Repositories\PersonalRepository;
use Domain\Personal\Values\BaseAuth\BaseAuthImp;
use Domain\Personal\Values\BaseAuth\Password\RawPassword;
use Exception;
use Infrastructure\Services\Auth\AuthService;

final class BaseLogin
{
    public function __construct(
        private PersonalRepository $repository,
        private AuthService    $authService,
    ) {}

    public function __invoke(BaseLoginDto $dto): ?string
    {
        $baseAuth = BaseAuthImp::new(
            UserEmail::new($dto->getEmail()),
            RawPassword::new($dto->getPassword()),
        );

        $user = $this->repository->getByEmail((string) $baseAuth->email());
        if (! $user) {
            $this->throwValidationException();
        }

        if ($user->baseAuth()->password()->check((string) $baseAuth->password())) {
            $this->throwValidationException();
        }

        $token = $this->authService->login($user);

        return $token;
    }

    private function throwValidationException(): void
    {
        // fixme временное решение для имитации валидации
        throw new Exception('Пароль и мэил не совпали');
    }
}
