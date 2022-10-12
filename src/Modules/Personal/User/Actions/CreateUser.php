<?php

declare(strict_types=1);

namespace Modules\Personal\User\Actions;

use Illuminate\Support\Facades\Hash;
use Modules\Personal\Auth\Structures\BaseAuth;
use Modules\Personal\Auth\Factories\BaseAuthFactory;
use Modules\Personal\Permissions\Factories\PermissionFactory;
use Modules\Personal\User\Factories\UserFactory;
use Modules\Personal\User\Structures\UserModel;

final class CreateUser
{
    public function __construct(
        private UserFactory       $userFactory,
        private BaseAuthFactory   $baseAuthFactory,
        private PermissionFactory $permissionFactory,
        private SaveUser          $saveUser,
    ) {}

    /**
     * @param array<mixed> $attributes
     */
    public function __invoke(array $attributes): UserModel
    {
        $user = $this->userFactory->create($attributes);
        $baseAuth = $this->baseAuthFactory->create($attributes);
        $permission = $this->permissionFactory->create($user, $attributes['permissions'] ?? []);
        ($this->saveUser)($user, $baseAuth, $permission);

        return $user;
    }
}
