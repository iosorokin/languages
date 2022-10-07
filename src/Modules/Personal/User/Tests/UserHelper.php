<?php

declare(strict_types=1);

namespace Modules\Personal\User\Tests;

use Core\Base\Helpers\AppHelper;
use Generator;
use Modules\Personal\Auth\Tests\BaseAuthHelper;
use Modules\Personal\Permissions\Enums\PermissionType;
use Modules\Personal\User\Actions\CreateUser;
use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Presenters\Special\InitRootUserPresenter;

final class UserHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'name' => $this->faker()->name(),
            'permissions' => [
                PermissionType::User,
            ]
        ];
    }

    public function createRoot(): User
    {
        $attributes = [
            'name' => 'Folyod',
            'email' => config('seed.users.super_admin.email'),
            'password' => config('seed.users.super_admin.password'),
            'permissions' => [
                PermissionType::Root,
            ],
        ];

        $presenter = app(InitRootUserPresenter::class);

        return $presenter($attributes);
    }

    public function create(int $count = 1, array $overwrite = []): Generator
    {
        /** @var CreateUser $action */
        $action = app(CreateUser::class);

        for ($i = 0; $i < $count; $i++) {
            $attributes = $overwrite
                + $this->generateAttributes()
                + BaseAuthHelper::new()->generateAttributes();

            $user = $action($attributes);

            yield $user;
        }
    }
}
