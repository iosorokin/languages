<?php

declare(strict_types=1);

namespace Modules\Personal\User\Helpers;

use Core\Base\Helpers\AppHelper;
use Generator;
use Modules\Personal\Auth\Helpers\BaseAuthSeedHelper;
use Modules\Personal\User\Model\User;
use Modules\Personal\User\Presenters\Mixins\CreateUser;
use Modules\Personal\User\Presenters\Special\InitRootUser;

final class UserSeedHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'name' => $this->faker()->name(),
        ];
    }

    public function createRoot(): User
    {
        $attributes = [
            'name' => 'Folyod',
            'email' => config('seed.users.super_admin.email'),
            'password' => config('seed.users.super_admin.password'),
            'roles' => [
                'root',
            ],
        ];

        $presenter = app(InitRootUser::class);

        return $presenter($attributes);
    }

    public function create(int $count = 1, array $overwrite = []): Generator
    {
        /** @var CreateUser $action */
        $action = app(CreateUser::class);

        for ($i = 0; $i < $count; $i++) {
            $attributes = $overwrite
                + $this->generateAttributes()
                + BaseAuthSeedHelper::new()->generateAttributes();
            $user = $action($attributes);

            yield $user;
        }
    }
}
