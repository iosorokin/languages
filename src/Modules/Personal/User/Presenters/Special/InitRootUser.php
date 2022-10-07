<?php

declare(strict_types=1);

namespace Modules\Personal\User\Presenters\Special;

use Modules\Personal\Permissions\Enums\PermissionType;
use Modules\Personal\User\Actions\CreateUser;
use Modules\Personal\User\Entities\User;

final class InitRootUser implements InitRootUserPresenter
{
    public function __construct(
        private CreateUser $createUser,
    ) {}

    public function __invoke(array $attributes): User
    {
        $this->addRootPermission($attributes);
        $user = ($this->createUser)($attributes);

        return $user;
    }

    private function addRootPermission(array &$attributes): void
    {
        $attributes['permissions'] = [
            PermissionType::Root,
        ];
    }
}
