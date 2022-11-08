<?php

declare(strict_types=1);

namespace Domain\Account\Actions\Auth;

use App\Values\Contacts\Email\UserEmail;
use Domain\Account\Dto\BaseLoginDto;
use Domain\Account\Model\Values\Password\RawPassword;
use Domain\Account\Repositories\AccountRepository;
use Domain\Account\Services\Auth\AuthService;
use Exception;

final class BaseLogin
{
    public function __construct(
        private AccountRepository $repository,
        private AuthService       $authService,
    ) {}

    public function __invoke(BaseLoginDto $dto): ?string
    {
        $email = UserEmail::new($dto->getEmail());
        $password = RawPassword::new($dto->getPassword());

        $account = $this->repository->getByEmail($email);
        if (! $account) {
            $this->throwValidationException();
        }

        if ($account->password()->check($password)) {
            $this->throwValidationException();
        }

        $token = $this->authService->login($account);

        return $token;
    }

    private function throwValidationException(): void
    {
        // fixme временное решение для имитации валидации
        throw new Exception('Пароль и мэил не совпали');
    }
}
