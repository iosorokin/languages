<?php

declare(strict_types=1);

namespace App\Helpers\Test;

use Core\Base\Helpers\AppHelper;
use Generator;
use Modules\Personal\App\Presenters\Personal\SeedUser;
use Modules\Personal\App\Presenters\Personal\Special\InitRootUser;
use Modules\Personal\Domain\Contexts\User;

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
        /** @var SeedUser $action */
        $action = app(SeedUser::class);

        for ($i = 0; $i < $count; $i++) {
            $attributes = $overwrite
                + $this->generateAttributes()
                + BaseAuthSeedHelper::new()->generateAttributes();
            $user = $action($attributes);

            yield $user;
        }
    }
}
