<?php

declare(strict_types=1);

namespace Domain\Account\Helpers\Test;

use App\Base\Helpers\AppHelper;
use Domain\Account\Actions\Console\InitRootAccount;
use Domain\Account\Actions\SeedUser;
use Domain\Account\Dto\NewAccountDto;
use Domain\Account\Dto\RestoreAccountDto;
use Domain\Account\Model\Aggregates\Account;
use Domain\Account\Model\Aggregates\AccountFactory;
use Generator;

final class AccountSeedHelper extends AppHelper
{
    public function generateStoreAttributes(): array
    {
        $attributes = [
            'name' => $this->faker()->name(),
        ];

        return $attributes + BaseAuthSeedHelper::new()->generateAttributes();
    }

    public function makeAccount(): Account
    {
        $dto = $this->restoreDto();
        /** @var AccountFactory $factory */
        $factory = app()->make(AccountFactory::class);

        return $factory->restore($dto);
    }

    public function generateFullAttributes(): array
    {
        $attributes = [
            'id' => random_int(1, 1000),
            'created_at' => now(),
            'is_student' => true,
            'is_root' => false,
        ]
            + $this->generateStoreAttributes()
            + AccessesSeedHelper::new()->generateAttributes();

        return $attributes;
    }

    public function registerDto(array $overwrite = []): NewAccountDto
    {
        $attributes = $overwrite + $this->generateStoreAttributes();
        $dto = NewAccountDto::new($attributes);

        return $dto;
    }

    public function restoreDto(array $overwrite = []): RestoreAccountDto
    {
        $attributes = $overwrite + $this->generateFullAttributes();
        $dto = RestoreAccountDto::new($attributes);

        return $dto;
    }

    public function createRoot(): Account
    {
        $attributes = [
            'name' => 'Folyod',
            'email' => config('seed.users.super_admin.email'),
            'password' => config('seed.users.super_admin.password'),
            'roles' => [
                'root',
            ],
        ];

        $presenter = app(InitRootAccount::class);

        return $presenter($attributes);
    }

    public function create(int $count = 1, array $overwrite = []): Generator
    {
        /** @var SeedUser $action */
        $action = app(SeedUser::class);

        for ($i = 0; $i < $count; $i++) {
            $attributes = $overwrite + $this->generateStoreAttributes();
            $user = $action(NewAccountDto::new($attributes));

            yield $user;
        }
    }
}
