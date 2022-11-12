<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Actions\Auth;

use App\Model\Values\Contacts\Email\UserEmail;
use Exception;
use WIP\Personal\Account\Dto\BaseLoginDto;
use WIP\Personal\Account\Model\Values\Password\RawPassword;
use WIP\Personal\Account\Repositories\AccountRepository;
use WIP\Personal\Account\Services\Auth\AuthService;

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
