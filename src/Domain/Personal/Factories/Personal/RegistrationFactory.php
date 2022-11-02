<?php

declare(strict_types=1);

namespace Domain\Personal\Factories\Personal;

use Domain\Personal\Actions\Guest\RegisterRequest;
use Domain\Personal\Entities\User;
use Illuminate\Contracts\Hashing\Hasher;

final class RegistrationFactory
{
    private array $errors;

    private User $personal;

    public function __construct(
        private Hasher $hasher,
    ) {}

    /**
     * @param RegisterRequest $request
     * @return User
     */
    public function create(RegisterRequest $request): User
    {

    }

    private function validate(callable $callable)
    {

    }
}
