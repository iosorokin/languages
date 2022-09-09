<?php

declare(strict_types=1);

namespace Modules\Personal\User\Presenters;

use App\Contracts\Presenters\Personal\User\CreateUserPresenter;
use App\Contracts\Structures\Personal\UserStructure;
use Modules\Personal\User\Factories\UserFactory;
use Modules\Personal\User\Validators\CreateUserValidator;

final class CreateUser implements CreateUserPresenter
{
    public function __construct(
        private CreateUserValidator $validator,
        private UserFactory $factory,
    ) {}

    /**
     * @param array<mixed> $attributes
     */
    public function __invoke(array $attributes): UserStructure
    {
        $attributes = $this->validator->validate($attributes);
        $user = $this->factory->new($attributes);

        return $user;
    }
}
