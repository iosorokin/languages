<?php

declare(strict_types=1);

namespace Modules\Personal\User\Actions;

use Illuminate\Support\Facades\DB;
use Modules\Personal\Auth\Repositories\BaseAuthRepository;
use Modules\Personal\Auth\Entity\BaseAuthModel;
use Modules\Personal\Permissions\Entities\Permission;
use Modules\Personal\Permissions\Repositories\PermissionRepository;
use Modules\Personal\User\Entities\UserModel;
use Modules\Personal\User\Repositories\UserRepository;

final class SaveUser
{
    public function __construct(
        private UserRepository $userRepository,
        private BaseAuthRepository $baseAuthRepository,
        private PermissionRepository $permissionRepository,
    ) {}

    public function __invoke(UserModel $user, BaseAuthModel $baseAuth, Permission $permission): void
    {
        DB::transaction(function () use ($user, $baseAuth, $permission) {
            $this->userRepository->save($user);
            $baseAuth->setUser($user);
            $this->baseAuthRepository->save($baseAuth);
            $permission->setUser($user);
            $this->permissionRepository->save($permission);
        });
    }
}
