<?php

declare(strict_types=1);

namespace Modules\Personal\User\Actions;

use Illuminate\Support\Facades\Hash;
use Modules\Personal\Auth\Entity\BaseAuth;
use Modules\Personal\Auth\Factories\ModelBaseAuthFactory;
use Modules\Personal\User\Factories\UserFactory;
use Modules\Personal\User\Entities\UserModel;

final class CreateUser
{
    public function __construct(
        private UserFactory          $userFactory,
        private ModelBaseAuthFactory $baseAuthFactory,
        private SaveUser             $saveUser,
    ) {}

    /**
     * @param array<mixed> $attributes
     */
    public function __invoke(array $attributes): UserModel
    {
        $user = $this->userFactory->create($attributes);
        $baseAuth = $this->baseAuthFactory->create($attributes);
        $this->hashPassword($baseAuth);
        ($this->saveUser)($user, $baseAuth);

        return $user;
    }

    private function hashPassword(BaseAuth $baseAuth): void
    {
        $hashedPassword = Hash::make($baseAuth->getPassword());
        $baseAuth->setPassword($hashedPassword);
    }
}
