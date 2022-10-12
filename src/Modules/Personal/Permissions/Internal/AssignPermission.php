<?php

declare(strict_types=1);

namespace Modules\Personal\Permissions\Internal;

use Modules\Personal\Permissions\Structures\Permission;
use Modules\Personal\Permissions\Enums\PermissionType;
use Modules\Personal\Permissions\Factories\PermissionFactory;
use Modules\Personal\Permissions\Repositories\PermissionRepository;
use Modules\Personal\User\Structures\User;

final class AssignPermission implements AssignPermissionPresenter
{
    public function __construct(
        private PermissionFactory    $factory,
        private PermissionRepository $repository,
    ) {}

    /**
     * @param array<PermissionType> $permissions
     */
    public function __invoke(User $user, array $permissions): Permission
    {
        $role = $this->factory->create($user, $permissions);
        $this->repository->save($role);

        return $role;
    }
}
