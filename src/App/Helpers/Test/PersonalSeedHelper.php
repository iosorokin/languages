<?php

declare(strict_types=1);

namespace App\Helpers\Test;

use App\Base\Helpers\AppHelper;
use Domain\Personal\Actions\Console\InitRootUser;
use Domain\Personal\Actions\SeedUser;
use Domain\Personal\Entities\User;
use Generator;

final class PersonalSeedHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        $attributes = [
            'name' => $this->faker()->name(),
        ];

        return $attributes + BaseAuthSeedHelper::new()->generateAttributes();
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
            $attributes = $overwrite + $this->generateAttributes();
            $user = $action($attributes);

            yield $user;
        }
    }
}
