<?php

declare(strict_types=1);

namespace Domain\Personal\Actions\Auth\Base;

use App\Validators\LoginValidator;
use Domain\Personal\Domain\UserRepository;
use Exception;
use Illuminate\Support\Facades\Hash;
use Infrastructure\Services\Auth\AuthService;

final class BaseLogin
{
    public function __construct(
        private LoginValidator $validator,
        private UserRepository $repository,
        private AuthService    $authService,
    ) {}

    public function __invoke(array $attributes): ?string
    {
        $attributes = $this->validator->validate($attributes);
        $user = $this->repository->getByEmail($attributes['email']);

        if (! $user) {
            $this->throwValidationException();
        }

        if (! Hash::check($attributes['password'], $user->baseAuth()->password()->value())) {
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
