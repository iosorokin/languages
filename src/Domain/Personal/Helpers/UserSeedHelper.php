<?php

declare(strict_types=1);

namespace Domain\Personal\Helpers;

use App\Base\Helpers\AppHelper;
use Domain\Personal\Actions\Console\InitRootUser;
use Domain\Personal\Actions\SeedUser;
use Domain\Personal\Dto\NewUserDto;
use Domain\Personal\Dto\RestoreUserDto;
use Domain\Personal\Entities\User;
use Domain\Personal\Entities\UserFactory;
use Generator;

final class UserSeedHelper extends AppHelper
{
    public function generateStoreAttributes(): array
    {
        $attributes = [
            'name' => $this->faker()->name(),
        ];

        return $attributes + BaseAuthSeedHelper::new()->generateAttributes();
    }

    public function makeUser(): User
    {
        $dto = $this->restoreDto();
        /** @var UserFactory $factory */
        $factory = app()->make(UserFactory::class);

        return $factory->restore($dto);
    }

    public function generateFullAttributes(): array
    {
        $attributes = [
            'id' => random_int(1, 1000),
            'created_at' => now(),
            'updated_at' => now(),
        ] + $this->generateStoreAttributes();

        return $attributes;
    }

    public function registerDto(array $overwrite = []): NewUserDto
    {
        $attributes = $overwrite + $this->generateStoreAttributes();
        $dto = NewUserDto::new($attributes);

        return $dto;
    }

    public function restoreDto(array $overwrite = []): RestoreUserDto
    {
        $attributes = $overwrite + $this->generateFullAttributes();
        $dto = RestoreUserDto::new($attributes);

        return $dto;
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
            $attributes = $overwrite + $this->generateStoreAttributes();
            $user = $action(NewUserDto::new($attributes));

            yield $user;
        }
    }
}
