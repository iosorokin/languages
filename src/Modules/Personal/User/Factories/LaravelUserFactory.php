<?php

declare(strict_types=1);

namespace Modules\Personal\User\Factories;

use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Entities\UserModel;
use Modules\Personal\User\Validators\CreateUserValidator;

final class LaravelUserFactory implements UserFactory
{
    public function __construct(
        private CreateUserValidator $createUserValidator,
    ) {}

    public function create(array $attributes): User
    {
        $attributes = $this->createUserValidator->validate($attributes);
        $user = new UserModel();
        $user->setName($attributes['name']);

        return $user;
    }
}
